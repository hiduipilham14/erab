<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use RealRashid\SweetAlert\Facades\Alert;

// tambahkan middleware dan hashmiddleware

class PermissionController extends Controller
{

    // tambahkan middleware dalam bentuk array
    // public static function middleware(): array
    // {
    //     return [
    //             new Middleware('permission:view permission', only: ['index']),
    //             new Middleware('permission:view permission', only: ['edit']),
    //             new Middleware('permission:view permission', only: ['create']),
    //             new Middleware('permission:view permission', only: ['destroy']),
    //     ];
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_akses'] = Akses::with('users', 'roles')->orderBy('group', 'asc')->get();
        $data['role'] = Role::with('users')->orderBy('name', 'asc')->get();
        $data['permission'] = Akses::orderBy('group', 'asc')->orderBy('name', 'asc')->get()->groupBy('group');
        // dd($data['role']);
        return view("permissions.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::findByName($request->role);
        if ($role) {
            $role->syncPermissions($request->permission);
        }

        Alert::success('Success', 'Data berhasil diubah !');
        return redirect()->route('permission.index');
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
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Akses::orderBy('group', 'asc')->get()->groupBy('group');
        return response()->json(['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:permissions,name,' . $id,
    ]);

    $permission = ModelsPermission::findOrFail($id);
    $permission->update([
        'name' => $request->name
    ]);

    return redirect()->route('permission.index')->with('success', 'Permission berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $permission = ModelsPermission::findOrFail($id);
    $permission->delete();

    return redirect()->route('permission.index')->with('success', 'Permission berhasil dihapus');
}
}
