<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function showProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //validate
        request()->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email, ' . $id . ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Tolong periksa passwordnya lagi')])
                    ->withInput();
            }
        }
        if (request()->hasFile('foto')) {
            // Pengecekan apakah foto sudah ada atau belum
            if ($user->foto && file_exists(public_path('admin/fotos/' . $user->foto))) {
                // Menghapus foto lama jika ada
                unlink(public_path('admin/fotos/' . $user->foto));
            }
        
            // Proses request foto setelah dicek
            $file = $request->file('foto');
            $fileName = 'foto-' . uniqid() . '-' . $file->getClientOriginalName();
        
            // Memindahkan file ke folder public/admin/fotos
            $file->move(public_path('admin/fotos/'), $fileName);
        
            // Menyimpan nama file di database menggunakan Eloquent
            $user->foto = $fileName;
        }
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'Profile Terupdate');
    }


}