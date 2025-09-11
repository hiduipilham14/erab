<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:lihat-pengguna')->only(['index', 'show']);
        $this->middleware('permission:tambah-pengguna')->only(['create', 'store']);
        $this->middleware('permission:edit-pengguna')->only(['edit', 'update']);
        $this->middleware('permission:hapus-pengguna')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Pengguna';
        $userRole = Role::findById(Auth::user()->role_id);
        if($userRole->name == User::$ROLE_SUPERADMIN) {
            $data['data'] = User::with('role')->get();
        } else {
            $data['data'] = User::with(['role' => function($query) {
                $query->where("name", "!=", User::$ROLE_SUPERADMIN);
            }])->get();
        }
        // dd(Auth::user()->getAllPermissions());
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah data';
        $user_role = auth()->user()->role_id;
        if($user_role == 1) {
            $data['roles'] = Role::orderBy('name', 'asc')->get();
        } else {
            $data['roles'] = Role::where('id', '!=', 1)->orderBy('name', 'asc')->get();
        }
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required',
        ]);

        $user = new User();
        $user->fill($request->except('password'));
        $user->password = bcrypt($request->password);
        $user->save();

        $role = Role::findById($request->role_id);
        $user->syncRoles($role);

        Alert::success('Success', 'Data berhasil disimpan !');
        return redirect()->route('user.index');
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
    public function edit(User $user)
    {
        //
        $data['user'] = $user;
        $data['title'] = 'Edit User';
        $userRole = Role::findById(Auth::user()->role_id);
        if($userRole->name == User::$ROLE_SUPERADMIN) {
            $data['role'] = Role::orderBy('name', 'asc')->get();;
        } else  {
            $data['role'] = Role::where('name', '!=', User::$ROLE_SUPERADMIN)->orderBy('name', 'asc')->get();;
        }
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id . ',id',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $role = Role::findById($request->role_id);
        $user->syncRoles($role);

        $user->update($request->all());

        Alert::info('Success', 'Data berhasil diupdate !');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $user->delete();
            Alert::success('Success', 'Data berhasil dihapus !');
            return redirect()->route('user.index');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Tidak bisa dihapus, Data sudah digunakan !');
            return redirect()->route('user.index');
        }
    }
}
