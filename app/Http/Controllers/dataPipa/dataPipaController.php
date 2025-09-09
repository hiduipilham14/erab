<?php

namespace App\Http\Controllers\dataPipa;

use App\Http\Controllers\Controller;
use App\Models\dataPipa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class dataPipaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = dataPipa::select('id', 'nama', 'deskripsi')->latest();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('data-pipa.edit', $row->id) . '" class="btn btn-sm btn-icon btn-primary me-1" title="Edit">';
                    $btn .= '<i class="ti ti-pencil"></i></a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-icon btn-danger btn-delete" title="Hapus">';
                    $btn .= '<i class="ti ti-trash"></i></button>';
                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dataPipa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'string|max:100',

        ]);

        $data = $request->only([
            'nama',
            'deskripsi',
        ]);

        $dataPipa = dataPipa::create($data);

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return response()->json([
            'data' => $dataPipa,
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
            $dataPipa = dataPipa::findOrFail($id);
            return response()->json($dataPipa);
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
            $dataPipa = dataPipa::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:100',
                'deskripsi' => 'string|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Validasi gagal'
                ], 422);
            }

            $validated = $validator->validated();

            $dataPipa->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $dataPipa
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
        $dataPipa = dataPipa::find($id);

        // Jika data tidak ditemukan
        if (!$dataPipa) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus data
        $dataPipa->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
