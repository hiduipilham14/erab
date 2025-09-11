<?php

namespace App\Http\Controllers\dataJaringanBaru;

use App\Http\Controllers\Controller;
use App\Models\dataJaringanBaru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\dataPipa;
use App\Models\dataDivisi;
use App\Models\dataDiameter;
use Illuminate\Support\Facades\Validator;
use DB;
class dataJaringanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = dataJaringanBaru::with([
                'data_divisi',
                'diameterJaringan.dataDiameter', // Eager load nested relation
                'volumeJaringan'
            ])->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('divisi', fn($row) => $row->data_divisi->nama ?? '-')
                ->addColumn('diameter', function($row) {
                    // Mengambil nama diameter dari relasi hasMany
                    $diameters = $row->diameterJaringan
                        ->pluck('dataDiameter.nama')
                        ->filter() // Menghilangkan nilai null
                        ->unique() // Menghilangkan duplikat
                        ->toArray();
                    
                    return !empty($diameters) ? implode(', ', $diameters) : '-';
                })
                ->addColumn('volume', function($row) {
                    // Mengambil volume dari relasi hasMany
                    $volumes = $row->volumeJaringan
                        ->pluck('volume')
                        ->filter() // Menghilangkan nilai null
                        ->unique() // Menghilangkan duplikat jika diperlukan
                        ->toArray();
                    
                    return !empty($volumes) ? implode(', ', $volumes) : '-';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-show-detail" data-id="' . $row->id . '">
                            <i class="ti ti-eye"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-icon edit-record" data-id="' . $row->id . '">
                            <i class="ti ti-edit"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-icon delete-record" data-id="' . $row->id . '">
                            <i class="ti ti-trash"></i>
                        </a>
                    </div>';
                })
            ->rawColumns(['action'])
            ->make(true);
        }

        $divisis = dataDivisi::all();
        $diameters = dataDiameter::all();
        // dd($diameters);
        $pipas = dataPipa::all();

        return view('dataJaringanBaru.index', compact('divisis', 'diameters', 'pipas'));
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
            'pekerjaan' => 'required|string|max:255',
            'divisi' => 'required|exists:data_divisis,id',
            'koordinat' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'jenis_pipa' => 'required|array',
            'jenis_pipa.*' => 'required|exists:data_pipas,id',
            'vol' => 'required|array',
            'vol.*' => 'required|string|max:100',
            'diameter' => 'required|array',
            'diameter.*' => 'required|exists:data_diameters,id',
            'keterangan' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'tanggal',
            'pekerjaan',
            'divisi',
            'koordinat',
            'lokasi',
            'keterangan',
        ]);

        $dataJaringanBaru = dataJaringanBaru::create($data);
        foreach ($request->jenis_pipa as $index => $jenisPipa) {
            DB::table('jenispipa_jaringan')->insert([
                'jenis_pipa' => $jenisPipa,
                'data_jaringan_barus_id' => $dataJaringanBaru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($request->vol as $index => $vol) {
            DB::table('volume_jaringan')->insert([
                'volume' => $vol,
                'data_jaringan_barus_id' => $dataJaringanBaru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($request->diameter as $index => $diameter) {
            DB::table('diameter_jaringan')->insert([
                'diameter' => $diameter,
                'data_jaringan_barus_id' => $dataJaringanBaru->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $dataJaringanBaru
        ], 201);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        try {
            $data = DataJaringanBaru::with([
                'data_divisi',
                'diameterJaringan', // Eager load nested relation
                'volumeJaringan',
                'jenisPipaJaringan' // Eager load nested relation
            ])->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'html' => view('dataJaringanBaru.detail', [
                    'data' => $data,
                    'formatted_tanggal' => $data->tanggal
                        ? Carbon::parse($data->tanggal)->format('d/m/Y')
                        : '-'
                ])->render()
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        } catch (\Exception $e) {
            \log()::error("Show error: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Server error'
            ], 500);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $dataJaringanBaru = DataJaringanBaru::with([
                'data_divisi',
                'diameterJaringan',
                'volumeJaringan',
                'jenisPipaJaringan'
            ])->findOrFail($id);
            return response()->json($dataJaringanBaru);
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
            $dataJaringanBaru = dataJaringanBaru::findOrFail($id);

            $validated = $request->validate([
                'tanggal' => 'required|date',
                'pekerjaan' => 'required|string|max:255',
                'divisi' => 'required|exists:data_divisis,id',
                'koordinat' => 'required|string|max:100',
                'lokasi' => 'required|string|max:255',
                'jenis_pipa' => 'required|array',
                'jenis_pipa.*' => 'required|exists:data_pipas,id',
                'vol' => 'required|array',
                'vol.*' => 'required|string|max:100',
                'diameter' => 'required|array',
                'diameter.*' => 'required|exists:data_diameters,id',
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

            $dataJaringanBaru->update($validated);
            DB::table('jenispipa_jaringan')->where('data_jaringan_barus_id', $dataJaringanBaru->id)->delete();
            DB::table('volume_jaringan')->where('data_jaringan_barus_id', $dataJaringanBaru->id)->delete();
            DB::table('diameter_jaringan')->where('data_jaringan_barus_id', $dataJaringanBaru->id)->delete();
            foreach ($request->jenis_pipa as $index => $jenisPipa) {
                DB::table('jenispipa_jaringan')->insert([
                    'jenis_pipa' => $jenisPipa,
                    'data_jaringan_barus_id' => $dataJaringanBaru->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            foreach ($request->vol as $index => $vol) {
                DB::table('volume_jaringan')->insert([
                    'volume' => $vol,
                    'data_jaringan_barus_id' => $dataJaringanBaru->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            foreach ($request->diameter as $index => $diameter) {
                DB::table('diameter_jaringan')->insert([
                    'diameter' => $diameter,
                    'data_jaringan_barus_id' => $dataJaringanBaru->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataJaringanBaru
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
        $dataJaringanBaru = dataJaringanBaru::find($id);

        // Jika data tidak ditemukan
        if (!$dataJaringanBaru) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus data
        $dataJaringanBaru->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
