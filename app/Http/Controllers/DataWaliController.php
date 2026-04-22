<?php

namespace App\Http\Controllers;

use App\Models\DataWali;
use Illuminate\Http\Request;

class DataWaliController extends Controller
{
    public function index()
    {
        $data_walis = DataWali::all();
        return view('user.datawali.index', compact('data_walis'));
    }

    public function create()
    {
        return view('user.datawali.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_wali' => 'nullable|string|max:100',
            'alamat_wali' => 'nullable|string|max:500',
            'no_hp_wali' => 'nullable|string|max:20',
        ]);

        $createData = DataWali::create([
              'user_id' => auth()->id(),
            'nama_wali' => $request->nama_wali ,
            'hubungan_wali' => $request->hubungan_wali ,
            'alamat_wali' => $request->alamat_wali ,
            'no_hp_wali' => $request->no_hp_wali ,
        ]);
        if ($createData) {
            return redirect()->route('user.datawalis.index')->with('success', 'Berhasil Membuat data');
        } else {
            return redirect()->back()->with('error', 'Gagagl membuat data ');
        }
    }

    public function edit($id)
    {
        $data_walis = DataWali::findOrFail($id);
        return view('user.datawali.edit', compact('data_walis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wali' => 'nullable|string|max:255',
            'hubungan' => 'nullable|string|max:100',
            'alamat_wali' => 'nullable|string|max:500',
            'no_hp_wali' => 'nullable|string|max:20',
        ]);
        $updateData = DataWali::where('id', $id)->update([
              'user_id' => auth()->id(),
             'nama_wali' => $request->nama_wali ,
            'hubungan_wali' => $request->hubungan_wali ,
            'alamat_wali' => $request->alamat_wali ,
            'no_hp_wali' => $request->no_hp_wali ,
        ]);
        if ($updateData) {
            return redirect()->route('user.datawalis.index')->with('success', 'Berhasil Menambahkan Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Meambahkan Data');
        }
    }

    public function destroy($id)
    {
        DataWali::findOrFail($id)->delete();
        return redirect()->route('user.datakeluargas.index')->with('success', 'Data Wali berhasil dihapus!');
    }
}
