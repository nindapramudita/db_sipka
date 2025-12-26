<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::orderBy('id', 'desc')->get();

        return view('backend.v_laporan.index', [
            'judul' => 'Data Laporan Kekerasan Anak',
            'laporan' => $laporan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_laporan.create', [
            'judul' => 'Tambah Laporan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'jenis_kekerasan' => 'required|max:100',
            'deskripsi_singkat' => 'required|min:10',
            'upload_bukti' => 'nullable|mimes:jpg,jpeg,png,mp4|max:2048',
            'status_laporan' => 'in:baru,diproses,selesai'
        ]);

        // ⭐ SIMPAN FILE BUKTI KALAU ADA
        if ($request->hasFile('upload_bukti')) {
            $file = $request->file('upload_bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti', $filename);
            $validatedData['upload_bukti'] = $filename;

    }

        Laporan::create($validatedData);

        return redirect()->route('laporan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('backend.v_laporan.edit', [
            'judul' => 'Ubah Laporan',
            'laporan' => $laporan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:250',
            'jenis_kekerasan' => 'required|max:100',
            'deskripsi_singkat' => 'required|min:10',
            'upload_bukti' => 'nullable|mimes:jpg,jpeg,png,mp4|max:2048',
            'status_laporan' => 'in:baru,diproses,selesai'
        ]);

            // ⭐ SIMPAN FILE BUKTI KALAU ADA
            if ($request->hasFile('upload_bukti')) {
                $validatedData['upload_bukti'] = $request
                    ->file('upload_bukti')
                    ->store('bukti', 'public');
    }

        Laporan::where('id', $id)->update($validatedData);

        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index');
    }
}