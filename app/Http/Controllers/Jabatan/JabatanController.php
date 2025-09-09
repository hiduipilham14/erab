<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:lihat-jabatan')->only(['index', 'show']);
        $this->middleware('permission:tambah-jabatan')->only(['create', 'store']);
        $this->middleware('permission:edit-jabatan')->only(['edit', 'update']);
        $this->middleware('permission:hapus-jabatan')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = Role::all();
        $data['title'] = "Jabatan";
        return view('jabatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Jabatan";
        return view('jabatan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $data = new Role(); // Gunakan huruf besar sesuai Model
        $data->create($request->all());

        return redirect()->route('jabatan.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(Role $jabatan)
    {
        $data['title'] = 'Edit Jabatan';
        $data['jabatan'] = $jabatan;
        return view('jabatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $jabatan)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $jabatan->id . ',id',
            'keterangan' => 'nullable',
        ]);
        $jabatan->update($request->all());

        Alert::info('Success', 'Data berhasil diupdate !');
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Role $jabatan)
{
    if ($jabatan->users()->count() > 0) {
        Alert::error('Gagal', 'Tidak bisa menghapus jabatan karena masih digunakan oleh user.');
        return redirect()->route('jabatan.index');
    }

    $jabatan->delete();

    Alert::success('Berhasil', 'Data jabatan berhasil dihapus.');
    return redirect()->route('jabatan.index');
}

}
