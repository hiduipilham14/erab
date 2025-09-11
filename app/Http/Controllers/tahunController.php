<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tahun;

use Illuminate\Support\Facades\Validator;

class tahunController extends Controller
{
   public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = tahun::select('id', 'nama', 'keterangan')->latest();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('data-tahun.edit', $row->id) . '" class="btn btn-sm btn-icon btn-primary me-1" title="Edit">';
                    $btn .= '<i class="ti ti-pencil"></i></a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-icon btn-danger btn-delete" title="Hapus">';
                    $btn .= '<i class="ti ti-trash"></i></button>';
                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dataTahun.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'keterangan' => 'string|max:100',

        ]);

        $data = $request->only([
            'nama',
            'keterangan',
        ]);

        $dataTahun = tahun::create($data);

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return response()->json([
            'data' => $dataTahun,
            'message' => 'Data berhasil disimpan'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $dataTahun = tahun::findOrFail($id);
            return response()->json($dataTahun);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data tidak ditemukan',
                'message' => 'Data tahun dengan ID tersebut tidak ditemukan dalam sistem'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $dataTahun = tahun::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:100',
                'keterangan' => 'string|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Validasi gagal'
                ], 422);
            }

            $validated = $validator->validated();

            $dataTahun->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataTahun
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
        $dataTahun = tahun::find($id);

        // Jika data tidak ditemukan
        if (!$dataTahun) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus data
        $dataTahun->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
