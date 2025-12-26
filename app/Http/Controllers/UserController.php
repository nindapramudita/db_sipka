<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    // ← WAJIB ADA

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('updated_at', 'desc')->get();

        return view('backend.v_user.index', [
            'judul' => 'Data User SIPKA',
            'user'  => $user
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_user.create', [
            'judul'=> 'Tambah User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:user,email',
        'password' => 'required',
        'hp' => 'required',
        'role' => 'required'
        ]);
        
        User::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'hp'=> $request->role,
            'role' => $request->role,
            'status' => 1
        ]);

        return redirect()->route('backend.user.index')
                         ->with('success', 'User berhasil ditambahkan!');

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
        $user = User::findOrfail($id);

        return view('backend.v_user.edit', [
            'judul' => 'Edit User',
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrfail($id);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role
        ]);

    return redirect()->route('backend.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::findOrfail($id)->delete();

        return redirect()->route('backend.user.index');
    }
}
