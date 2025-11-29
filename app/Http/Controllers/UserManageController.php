<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserManageController extends Controller
{
    public function index()
    {
        $penggunas = User::where('role', 'pengguna')
            ->withCount('balitas')
            ->withCount('ibu_hamils')
            ->paginate(10);

        return view('kader.user.index', compact('penggunas'));
    }

    public function create()
    {
        return view('kader.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'pengguna',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Pengguna berhasil didaftarkan.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
