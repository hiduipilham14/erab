<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akses;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class AksesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:lihat-akses')->only(['index']);
        $this->middleware('permission:edit-akses')->only(['edit', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_akses'] = Akses::with('users', 'roles')->orderBy('group', 'asc')->get();
        $data['title'] = 'Akses';
        $data['role'] = Role::with('users')->orderBy('name', 'asc')->get();
        $data['permission'] = Akses::orderBy('group', 'asc')->orderBy('name', 'asc')->get()->groupBy('group');
        return view('permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return redirect()->route('akses.index');
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
    public function edit(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Akses::orderBy('group', 'asc')->get()->groupBy('group');
        return response()->json(['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
