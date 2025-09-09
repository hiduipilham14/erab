<?php

namespace App\Http\Controllers\dataPenggantianPipa;

use App\Http\Controllers\Controller;
use App\Models\dataPenggantianPipa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\dataPipa;
use App\Models\dataDivisi;
use App\Models\dataDiameter;


class dataPenggantianPipaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = dataPenggantianPipa::with(['data_divisi', 'diameterLama', 'diameterBaru'])
                ->select('id', 'tanggal', 'divisi', 'lokasi', 'dn_lama', 'dn_baru', 'vol_lama', 'vol_baru')
                ->latest();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('divisi', fn($row) => $row->data_divisi->nama ?? '-')
                ->addColumn('dn_lama', fn($row) => $row->diameterLama->nama ?? '-')
                ->addColumn('dn_baru', fn($row) => $row->diameterBaru->nama ?? '-')
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

        $divisis = dataDivisi::all();
        $diameters = dataDiameter::all();
        // dd($diameters);
        $pipas = dataPipa::all();

        return view('dataPenggantianPipa.index', compact('divisis', 'diameters', 'pipas'));
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
            'divisi' => 'required|exists:data_divisis,id',
            'pipa_lama' => 'required|exists:data_pipas,id',
            'pipa_baru' => 'required|exists:data_pipas,id',
            'dn_lama' => 'required|exists:data_diameters,id',
            'dn_baru' => 'required|exists:data_diameters,id',
            'th_pemasangan_lama' => 'required|string|max:100',
            'th_pemasangan_baru' => 'required|string|max:100',
            'koordinat' => 'required|string|max:255',
            'vol_lama' => 'required|string|max:100',
            'vol_baru' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'tanggal',
            'divisi',
            'pipa_lama',
            'pipa_baru',
            'dn_lama',
            'dn_baru',
            'th_pemasangan_lama',
            'th_pemasangan_baru',
            'koordinat',
            'vol_lama',
            'vol_baru',
            'lokasi',
            'keterangan',
        ]);

        $dataPenggantianPipa = dataPenggantianPipa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $dataPenggantianPipa
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = dataPenggantianPipa::with([
                'data_divisi:id,nama',
                'pipaLama:id,nama',
                'pipaBaru:id,nama',
                'diameterLama:id,nama',
                'diameterBaru:id,nama'
            ])->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'html' => view('dataPenggantianPipa.detail', [
                    'data' => $data,
                    'formatted_tanggal' => optional($data->tanggal)->format('d/m/Y') ?? '-'
                ])->render()
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            \Log::error("Error showing penggantian pipa: " . $e->getMessage());
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
            $dataPenggantianPipa = dataPenggantianPipa::findOrFail($id);
            return response()->json($dataPenggantianPipa);
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
            $dataPenggantianPipa = dataPenggantianPipa::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'tanggal' => 'required|date',
                'divisi' => 'required|exists:data_divisis,id',
                'pipa_lama' => 'required|exists:data_pipas,id',
                'pipa_baru' => 'required|exists:data_pipas,id',
                'dn_lama' => 'required|exists:data_diameters,id',
                'dn_baru' => 'required|exists:data_diameters,id',
                'th_pemasangan_lama' => 'required|string|max:100',
                'th_pemasangan_baru' => 'required|string|max:100',
                'koordinat' => 'required|string|max:255',
                'vol_lama' => 'required|string|max:100',
                'vol_baru' => 'required|string|max:100',
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

            $dataPenggantianPipa->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataPenggantianPipa
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
        $dataPenggantianPipa = dataPenggantianPipa::find($id);

        // Jika data tidak ditemukan
        if (!$dataPenggantianPipa) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus data
        $dataPenggantianPipa->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
