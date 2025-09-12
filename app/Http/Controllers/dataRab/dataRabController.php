<?php

namespace App\Http\Controllers\dataRab;

use App\Http\Controllers\Controller;
use App\Models\DataRab;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\dataPipa;
use App\Models\dataDivisi;
use App\Models\dataDiameter;
use Illuminate\Support\Facades\Validator;
use DB;
use Storage;
class dataRabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataRab::with(['diameterRab','jenisPipaRab', 'volumeRab'])->orderBy('created_at', 'desc')->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-sm btn-icon btn-info me-1 btn-show-detail" data-id="' . $row->id . '" title="Detail">
                <i class="ti ti-eye"></i>
                </button>';
                    $btn .= '<a href="' . route('data-rab.edit', $row->id) . '" class="btn btn-sm btn-icon btn-primary me-1" title="Edit">
                <i class="ti ti-pencil"></i>
                </a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-icon btn-danger btn-delete" title="Hapus">
                <i class="ti ti-trash"></i>
                </button>';
                    return $btn;
                })
                ->addColumn('diameter', function($row) {
                    $diameters = $row->diameterRab
                        ->pluck('dataDiameter.nama')
                        ->filter()
                        ->unique()
                        ->toArray();
                    
                    return !empty($diameters) ? implode(', ', $diameters) : '-';
                })
                ->addColumn('jenisPipaRab', function($row) {
                    $jenisPipa = $row->jenisPipaRab
                        ->pluck('dataPipa.nama')
                        ->filter() 
                        ->unique() 
                        ->toArray();

                    return !empty($jenisPipa) ? implode(', ', $jenisPipa) : '-';
                })
                ->addColumn('volume', function($row) {
                    $volumes = $row->volumeRab
                        ->pluck('volume')
                        ->filter() 
                        ->unique() 
                        ->toArray();
                    
                    return !empty($volumes) ? implode(', ', $volumes) : '-';
                })
                
                ->rawColumns(['action', 'diameter', 'jenisPipaRab', 'volume'])
                ->make(true);
        }
        $diameters = dataDiameter::all();
        $pipas = dataPipa::all();
        return view('dataRab.index', compact( 'diameters', 'pipas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_input' => 'required|date',
            'tanggal_awal' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tanggal_pelaksana' => 'required|date',
            // Data SPK
            'no_spk' => 'required|max:100',
            
            // Data teknis pekerjaan
            'masa_pemeliharaan' => 'nullable|max:300',
            'penyedia_pipa' => 'nullable|max:300',
            
            // File uploads
            'file_spk' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
            'file_ded' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
            'file_rab' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
            
            // Data biaya
            'honor' => 'required|numeric|min:0',
            'rab' => 'required|numeric|min:0',
            'bahan' => 'required|numeric|min:0',
            'upah' => 'required|numeric|min:0',
            'jumlah' => 'required|numeric|min:0',
            
            // Data GIS
            'gis' => 'nullable|max:100',
            'pekerjaan_gis' => 'nullable|max:300',
            'lokasi_gis' => 'nullable|max:300',
            'keterangan_gis' => 'nullable|max:500',
        ]);

        $data = $request->only([
            'tanggal_input',
            'tanggal_awal',
            'tanggal_selesai',
            'no_spk',
            'masa_pemeliharaan',
            'penyedia_pipa',
            'rab',
            'honor',
            'bahan',
            'upah',
            'jumlah',
            'gis',
            'tanggal_pelaksana',
            'pekerjaan_gis',
            'lokasi_gis',
            'keterangan_gis'
        ]);

        // Handle all file uploads
        foreach (['file_spk', 'file_ded', 'file_rab'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('/uploads', $fileName);
                $data[$field] = $path;
            }
        }

        // dd($request->all(), $data);

        $dataRab = dataRab::create($data);
        foreach ($request->jenis_pipa as $index => $jenisPipa) {
            DB::table('jenispipa_rab')->insert([
                'jenis_pipa' => $jenisPipa,
                'data_rab_id' => $dataRab->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($request->vol as $index => $vol) {
            DB::table('volume_rab')->insert([
                'volume' => $vol,
                'data_rab_id' => $dataRab->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($request->diameter as $index => $diameter) {
            DB::table('diameter_rab')->insert([
                'diameter' => $diameter,
                'data_rab_id' => $dataRab->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $dataRab
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = DataRab::with(['diameterRab','jenisPipaRab', 'volumeRab'])->findOrFail($id);
            $data->tanggal_input = \Carbon\Carbon::parse($data->tanggal_input)->format('d/m/Y');
            $data->tanggal_awal = \Carbon\Carbon::parse($data->tanggal_awal)->format('d/m/Y');
            $data->tanggal_selesai = \Carbon\Carbon::parse($data->tanggal_selesai)->format('d/m/Y');
            $data->tanggal_pelaksana = \Carbon\Carbon::parse($data->tanggal_pelaksana)->format('d/m/Y');
            // Gunakan helper: hilangkan titik ribuan dan ubah koma jadi titik desimal, lalu cast float.
            $rab = str_replace('.', '', $data->rab);
            $rab = str_replace(',', '.', $rab);

            $honor = str_replace('.', '', $data->honor);
            $honor = str_replace(',', '.', $honor);

            $bahan = str_replace('.', '', $data->bahan);
            $bahan = str_replace(',', '.', $bahan);

            $upah = str_replace('.', '', $data->upah);
            $upah = str_replace(',', '.', $upah);

            $jumlah = str_replace('.', '', $data->jumlah);
            $jumlah = str_replace(',', '.', $jumlah);

            $data->formatted_rab = 'Rp ' . number_format((float) $rab, 0, ',', '.');
            $data->formatted_honor = 'Rp ' . number_format((float) $honor, 0, ',', '.');
            $data->formatted_bahan = 'Rp ' . number_format((float) $bahan, 0, ',', '.');
            $data->formatted_upah = 'Rp ' . number_format((float) $upah, 0, ',', '.');
            $data->formatted_jumlah = 'Rp ' . number_format((float) $jumlah, 0, ',', '.');
            $data->file_spk = $data->file_spk ? Storage::url($data->file_spk) : null;
            $data->file_ded = $data->file_ded ? Storage::url($data->file_ded) : null;
            $data->file_rab = $data->file_rab ? Storage::url($data->file_rab) : null;
            return response()->json([
                'status' => 'success',
                'html' => view('dataRab.detail', compact('data'))->render()
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error("Data not found: {$id} - " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Data RAB tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            dd($e->getMessage());
            \Log::error("Server error on RAB detail: " . $e->getMessage());
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
            $dataUpdateGis = dataRab::with(['diameterRab','jenisPipaRab', 'volumeRab'])->findOrFail($id);
            return response()->json($dataUpdateGis);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data tidak ditemukan',
                'message' => 'RAB dengan ID tersebut tidak ditemukan dalam sistem'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $dataRab = dataRab::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'tanggal_input' => 'required|date',
                'tanggal_awal' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'tanggal_pelaksana' => 'required|date',
                // Data SPK
                'no_spk' => 'required|max:100',
                // Data teknis pekerjaan
                'masa_pemeliharaan' => 'nullable|max:300',
                'penyedia_pipa' => 'nullable|max:300',
                // File uploads
                'file_spk' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
                'file_ded' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
                'file_rab' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
                // Data biaya
                'honor' => 'required|numeric|min:0',
                'rab' => 'required|numeric|min:0',
                'bahan' => 'required|numeric|min:0',
                'upah' => 'required|numeric|min:0',
                'jumlah' => 'required|numeric|min:0',
                // Data GIS
                'gis' => 'nullable|max:100',
                'pekerjaan_gis' => 'nullable|max:300',
                'lokasi_gis' => 'nullable|max:300',
                'keterangan_gis' => 'nullable|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Validasi gagal'
                ], 422);
            }

            $validated = $validator->validated();

            $dataRab->update($validated);
            DB::table('jenispipa_rab')->where('data_rab_id', $dataRab->id)->delete();
            DB::table('volume_rab')->where('data_rab_id', $dataRab->id)->delete();
            DB::table('diameter_rab')->where('data_rab_id', $dataRab->id)->delete();
            foreach ($request->jenis_pipa as $index => $jenisPipa) {
                DB::table('jenispipa_rab')->insert([
                    'jenis_pipa' => $jenisPipa,
                    'data_rab_id' => $dataRab->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            foreach ($request->vol as $index => $vol) {
                DB::table('volume_rab')->insert([
                    'volume' => $vol,
                    'data_rab_id' => $dataRab->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            foreach ($request->diameter as $index => $diameter) {
                DB::table('diameter_rab')->insert([
                    'diameter' => $diameter,
                    'data_rab_id' => $dataRab->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataRab
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
        $dataRab = dataRab::find($id);

        // Jika data tidak ditemukan
        if (!$dataRab) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        DB::table('jenispipa_rab')->where('data_rab_id', $dataRab->id)->delete();
        DB::table('volume_rab')->where('data_rab_id', $dataRab->id)->delete();
        DB::table('diameter_rab')->where('data_rab_id', $dataRab->id)->delete();
        // Hapus data
        $dataRab->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
