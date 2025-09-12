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
                    // Mengambil nama diameter dari relasi hasMany
                    $diameters = $row->diameterRab
                        ->pluck('dataDiameter.nama')
                        ->filter() // Menghilangkan nilai null
                        ->unique() // Menghilangkan duplikat
                        ->toArray();
                    
                    return !empty($diameters) ? implode(', ', $diameters) : '-';
                })
                ->addColumn('jenisPipaRab', function($row) {
                    // Mengambil nama jenis pipa dari relasi hasMany
                    $jenisPipa = $row->jenisPipaRab
                        ->pluck('dataPipa.nama')
                        ->filter() // Menghilangkan nilai null
                        ->unique() // Menghilangkan duplikat
                        ->toArray();

                    return !empty($jenisPipa) ? implode(', ', $jenisPipa) : '-';
                })
                ->addColumn('volume', function($row) {
                    // Mengambil volume dari relasi hasMany
                    $volumes = $row->volumeRab
                        ->pluck('volume')
                        ->filter() // Menghilangkan nilai null
                        ->unique() // Menghilangkan duplikat jika diperlukan
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
            'tanggal' => 'required|date',
            'tanggal_pelaksana' => 'required|date',
            'no_spk' => 'required|max:100',
            'pekerjaan' => 'required|max:300',
            'masa_pemeliharaan' => 'required|max:300',
            'penyedia' => 'required|max:300',
            'vol' => 'required|max:100',
            'lokasi' => 'required|max:300',
            'rab' => 'required|max:100',
            'keterangan' => 'required|max:300',
            'honor' => 'required|max:300',
            'bahan' => 'required|max:100',
            'upah' => 'required|max:100',
            'jumlah' => 'required|max:100',
            'gis' => 'nullable|max:100',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
            'file2' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
            'file3' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
        ]);

        $data = $request->only([
            'tanggal',
            'tanggal_pelaksana',
            'no_spk',
            'pekerjaan',
            'masa_pemeliharaan',
            'penyedia',
            'vol',
            'lokasi',
            'rab',
            'keterangan',
            'honor',
            'bahan',
            'upah',
            'jumlah',
            'gis'
        ]);

        // Handle all file uploads
        foreach (['file', 'file2', 'file3'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/uploads', $fileName);
                $data[$field] = str_replace('public/', '', $path);
            }
        }

        // dd($request->all(), $data);

        $dataRab = dataRab::create($data);

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
            $data = DataRab::select([
                'id',
                'tanggal',
                'tanggal_pelaksana',
                'no_spk',
                'pekerjaan',
                'masa_pemeliharaan',
                'penyedia',
                'vol',
                'lokasi',
                'rab',
                'keterangan',
                'honor',
                'bahan',
                'upah',
                'jumlah',
                'gis',
                'file',
                'file2',
                'file3'
            ])->findOrFail($id);

            $data->formatted_tanggal = \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y');

            // Gunakan helper: hilangkan titik ribuan dan ubah koma jadi titik desimal, lalu cast float.
            $rab = str_replace('.', '', $data->rab);
            $rab = str_replace(',', '.', $rab);

            $rab = str_replace('.', '', $data->honor);
            $rab = str_replace(',', '.', $honor);

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
            $dataUpdateGis = dataRab::findOrFail($id);
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
                'tanggal' => 'required|date',
                'tanggal_pelaksana' => 'required|date',
                'no_spk' => 'required|max:100',
                'pekerjaan' => 'required|max:300',
                'masa_pemeliharaan' => 'required|max:300',
                'penyedia' => 'required|max:300',
                'vol' => 'required|max:100',
                'lokasi' => 'required|max:300',
                'rab' => 'required|max:100',
                'keterangan' => 'required|max:300',
                'honor' => 'required|max:300',
                'bahan' => 'required|max:100',
                'upah' => 'required|max:100',
                'jumlah' => 'required|max:100',
                'gis' => 'nullable|max:100',
                'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
                'file2' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
                'file3' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:20048',
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

        // Hapus data
        $dataRab->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
