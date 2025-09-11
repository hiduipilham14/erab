<?php

namespace App\Http\Controllers\pengaturanAkun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengaturanAkunController extends Controller
{
    public function index()
    {
        return view('pengaturanAkun.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $validated['name'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::delete('public/profile/'.$user->image);
            }

            // Store new image
            $path = $request->file('image')->store('profile', 'public');
            $user->image = basename($path);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function password(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if (!Hash::check($validated['current_password'], auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        auth()->user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
