<?php

namespace App\Http\Controllers;

use App\Models\DataAyah;
use Illuminate\Http\Request;

class DataAyahController extends Controller
{
    public function index()
    {
        // $data_ayahs = DataAyah::all();
        // return view('user.dataayah.index', compact('data_ayahs'));
    }

    public function create()
    {
        // return view('user.dataayah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'nullable|string|max:255',
            'tanggal_lahir_ayah' => 'nullable|date',
            'pendidikan_ayah' => 'nullable|string   |max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|numeric',
            'no_hp_ayah' => 'nullable|string|max:20',
        ],[
            'nama_ayah' => 'Nama Ayah harus diisi ',
            'tempat_lahir_ayah' => 'Tempat lahir Harus Diisi',
            'tanggal_lahir_ayah' => 'Tanggal Lahir harus diisi',
            'pendidikan_ayah' => 'pendidikan Ayah Harus diisi',
            'pekerjaan_ayah' => 'Pekerjaan Ayah Harus diisi',
            'penghasilan_ayah' => 'Penghasilan Ayah Harus disi',
            'no_hp_ayah' => 'No hp ayah Harus diisi',
        ]);
        $createData = DataAyah::create([
            'user_id' => auth()->id(),
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah ,
            'pekerjaan_ayah' => $request->pekerjaan_ayah ,
            'penghasilan_ayah' => $request->penghasilan_ayah ,
            'alamat_ayah' => $request->alamat_ayah ,
            'no_hp_ayah' => $request->no_hp_ayah ,
        ]);
        // if ($createData) {
        //     return redirect()->route('user.dataayahs.index')->with('success', 'Berhasil Membuat data ');
        // } else {
        //     return redirect()->back()->with('error', 'Gagal Membuat Data');
        // }
    }

    public function edit($id)
    {
        $data_ayahs = DataAyah::findOrFail($id);
        return view('user.datakeluarga.edit', compact('data_ayahs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => auth()->id(),
           'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'nullable|string|max:255',
            'tanggal_lahir_ayah' => 'nullable|date',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|numeric',
            'no_hp_ayah' => 'nullable|string|max:20',
        ]);
        $updateData = DataAyah::where('id', $id)->update([
            'user_id' => auth()->id(),
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah ,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah ,
            'pendidikan_ayah' => $request->pendidikan_ayah ,
            'pekerjaan_ayah' => $request->pekerjaan_ayah ,
            'penghasilan_ayah' => $request->penghasilan_ayah ,
            'alamat_ayah' => $request->alamat_ayah,
            'no_hp_ayah' => $request->no_hp_ayah ,
        ]);
        if ($updateData) {
            return redirect()->route('user.dataayahs.index')->with('success', 'Berhasil Membuat data ');
        } else {
            return redirect()->back()->with('error', 'Gagal Membuat data');
        }
    }

    public function destroy($id)
    {
        DataAyah::findOrFail($id)->delete();
        return redirect()->route('user.datakeluargas.index')->with('success', 'Data Ayah berhasil dihapus!');
    }
}





