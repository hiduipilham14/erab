<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Models\Role as ModelsRole;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
// tambahkan middleware dan hashmiddleware

class RoleController extends Controller
// implements HasMiddleware
{
    // tambahkan middleware dalam bentuk array
    // public static function middleware(): array
    // {
    //     return [
    //             new Middleware('permission:view roles', only: ['index']),
    //             new Middleware('permission:view roles', only: ['edit']),
    //             new Middleware('permission:view roles', only: ['create']),
    //             new Middleware('permission:view roles', only: ['destroy']),
    //     ];
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ModelsRole::all();
        return view('role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name','ASC')->get();
        return view("role.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'array', // Opsional jika ada permissions
    ]);

    try {
        // Simpan data role
        $role = ModelsRole::create(['name' => $request->name]);

        // Jika ada permissions, attach ke role
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('role.index')->with('success', 'Role berhasil disimpan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
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
    // Show the form for editing the specified resource.
public function edit(string $id)
{
    $role = ModelsRole::findOrFail($id); // Ambil role berdasarkan ID
    $permissions = Permission::orderBy('name', 'ASC')->get(); // Semua permission
    $rolePermissions = $role->permissions->pluck('name')->toArray(); // Permission yang sudah dimiliki role ini

    return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
}

// Update the specified resource in storage.
public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:roles,name,' . $id,
        'permissions' => 'array', // opsional
    ]);

    try {
        $role = ModelsRole::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions); // Sinkronisasi permission
        } else {
            $role->syncPermissions([]); // Kalau kosong, hapus semua permission
        }

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = ModelsRole::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }

}
