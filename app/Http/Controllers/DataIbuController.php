<?php

namespace App\Http\Controllers;

use App\Models\DataIbu;
use Illuminate\Http\Request;

class DataIbuController extends Controller
{
    public function index()
    {
        $data_ibus = DataIbu::all();
        return view('user.dataibu.index', compact('data_ibus'));
    }

    public function create()
    {
        return view('user.dataibu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'nullable|string|max:255',
            'tanggal_lahir_ibu' => 'nullable|date',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|numeric',
            'no_hp_ibu' => 'nullable|string|max:20',
        ]);
        $createData = DataIbu::create([
            'user_id' => auth()->id(),
            'nama_ibu' => $request->nama_ibu,
            'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'no_hp_ibu' => $request->no_hp_ibu,
        ]);
        if ($createData) {
            return redirect()->route('user.dataibus.index')->with('success', 'Berhasil Menambahkan data ');
        } else {
            return redirect()->back()->with('error', 'Gagal Membuat data');
        }
    }

    public function edit($id)
    {
        $data_ibus = DataIbu::findOrFail($id);
        return view('user.dataibu.edit', compact('data_ibus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'nullable|string|max:255',
            'tanggal_lahir_ibu' => 'nullable|date',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|numeric',
            'no_hp_ibu' => 'nullable|string|max:20',
        ]);
        $updateData = Dataibu::where('id', $id)->update([
              'user_id' => auth()->id(),
            'nama_ibu' => $request->nama_ibu,
            'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'no_hp_ibu' => $request->no_hp_ibu,
        ]);
        if ($updateData) {
            return redirect()->route('user.dataibus.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengubah data');
        }
    }

    public function destroy($id)
    {
        DataIbu::findOrFail($id)->delete();
        return redirect()->route('user.datakeluargas.index')->with('success', 'Data Ibu berhasil dihapus!');
    }
}
