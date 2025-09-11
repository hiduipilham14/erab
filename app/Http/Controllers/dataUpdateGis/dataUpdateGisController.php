<?php

namespace App\Http\Controllers\dataUpdateGis;

use App\Http\Controllers\Controller;
use App\Models\dataDiameter;
use Illuminate\Http\Request;
use App\Models\dataUpdateGis;
use App\Models\dataPipa;
use App\Models\dataDivisi;
use Illuminate\Support\Facades\Validator;



class dataUpdateGisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = dataUpdateGis::with([
                'divisi',
                'pipaGis',
                'pipaLap',
                'gateValveGis',
                'gateValveLap',
                'airValveGis',
                'airValveLap'
            ])
                ->select(
                    'id',
                    'tanggal',
                    'divisi_id',
                    'kegiatan',
                    'lokasi',
                    'koordinat',
                    'vol',
                    'pipa_gis',
                    'pipa_lap',
                    'gate_valve_gis',
                    'gate_valve_lap',
                    'air_valve_gis',
                    'air_valve_lap',
                    'keterangan'
                )
                ->latest();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('divisi', fn($row) => $row->divisi->nama ?? '-')
                ->addColumn('pipa_gis', fn($row) => $row->pipaGis->nama ?? '-')
                ->addColumn('pipa_lap', fn($row) => $row->pipaLap->nama ?? '-')

                ->addColumn('gate_valve_gis', fn($row) => $row->gateValveGis->nama ?? '-')
                ->addColumn('gate_valve_lap', fn($row) => $row->gateValveLap->nama ?? '-')
                ->addColumn('air_valve_gis', fn($row) => $row->airValveGis->nama ?? '-')
                ->addColumn('air_valve_lap', fn($row) => $row->airValveLap->nama ?? '-')

                ->addColumn('action', function ($row) {
                    return '
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-show-detail" data-id="' . $row->id . '">
                            <i class="ti ti-eye"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-icon edit-record" data-id="' . $row->id . '">
                            <i class="ti ti-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-icon delete-record" data-id="' . $row->id . '">
                            <i class="ti ti-trash"></i>
                        </a>
                    </div>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Debug data sebelum dikirim ke view


        $divisis = dataDivisi::all();
        $diameters = dataDiameter::all();
        // dd($diameters);
        $pipas = dataPipa::all();
        return view('dataUpdateGis.index', compact('divisis', 'diameters', 'pipas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisis = dataDivisi::all();
        $diameters = dataDiameter::all();
        $pipas = dataPipa::all();


        return response()->json([
            'divisis' => $divisis,
            'diameters' => $diameters,
            'pipas' => $pipas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'divisi_id' => 'required|exists:data_divisis,id',
            'kegiatan' => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'vol' => 'required|string|max:100',
            'gate_valve_gis' => 'required|exists:data_diameters,id',
            'gate_valve_lap' => 'required|exists:data_diameters,id',
            'pipa_gis' => 'required|exists:data_pipas,id',
            'pipa_lap' => 'required|exists:data_pipas,id',
            'air_valve_gis' => 'required|exists:data_diameters,id',
            'air_valve_lap' => 'required|exists:data_diameters,id',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'tanggal',
            'divisi_id',
            'kegiatan',
            'koordinat',
            'vol',
            'gate_valve_gis',
            'gate_valve_lap',
            'pipa_gis',
            'pipa_lap',
            'air_valve_gis',
            'air_valve_lap',
            'lokasi',
            'keterangan'
        ]);

        $dataUpdateGis = dataUpdateGis::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $dataUpdateGis
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = dataUpdateGis::with('divisi')->findOrFail($id);

            $data->formatted_tanggal = \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y');

            return response()->json([
                'status' => 'success',
                'html' => view('dataUpdateGis.detail', compact('data'))->render()
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error("Data not found: {$id} - " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Data Update GIS tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            \Log::error("Server error on Update Gis detail: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $dataUpdateGis = dataUpdateGis::findOrFail($id);
            return response()->json($dataUpdateGis);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data tidak ditemukan',
                'message' => 'Kegiatan dengan ID tersebut tidak ditemukan dalam sistem'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $dataUpdateGis = dataUpdateGis::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'tanggal' => 'required|date',
                'divisi_id' => 'required|exists:data_divisis,id',
                'kegiatan' => 'required|string|max:255',
                'koordinat' => 'required|string|max:255',
                'vol' => 'required|string|max:100',
                'gate_valve_gis' => 'required|exists:data_diameters,id',
                'gate_valve_lap' => 'required|exists:data_diameters,id',
                'pipa_gis' => 'required|exists:data_pipas,id',
                'pipa_lap' => 'required|exists:data_pipas,id',
                'air_valve_gis' => 'required|exists:data_diameters,id',
                'air_valve_lap' => 'required|exists:data_diameters,id',
                'lokasi' => 'required|string|max:255',
                'keterangan' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Validasi gagal'
                ], 422);
            }

            $validated = $validator->validated();

            $dataUpdateGis->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataUpdateGis
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data berdasarkan ID
        $dataUpdateGis = dataUpdateGis::find($id);

        // Jika data tidak ditemukan
        if (!$dataUpdateGis) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus data
        $dataUpdateGis->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
