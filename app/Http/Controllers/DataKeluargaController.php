<?php

namespace App\Http\Controllers;
use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $userId = auth()->id();

        $data_ayah_id = DataAyah::where('user_id', $userId)->get();
        $data_ibu_id = DataIbu::where('user_id', $userId)->get();
        $data_wali_id = DataWali::where('user_id', $userId)->get();

        return view('user.datakeluarga.index', compact('data_ayah_id', 'data_ibu_id', 'data_wali_id'));
    }




    public function show($id)
    {
        $data_keluargas = DataKeluarga::with(['ayah', 'ibu', 'wali', 'siswa'])->findOrFail($id);
        return view('user.datakeluarga.show', compact('data_keluargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.datakeluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            // Ayah
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'nullable|string|max:255',
            'tanggal_lahir_ayah' => 'nullable|date',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|numeric',
            'no_hp_ayah' => 'nullable|string|max:20',

            // Ibu
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'nullable|string|max:255',
            'tanggal_lahir_ibu' => 'nullable|date',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|numeric',
            'no_hp_ibu' => 'nullable|string|max:20',

            // Wali
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_wali' => 'nullable|string|max:100',
            'alamat_wali' => 'nullable|string|max:500',
            'no_hp_wali' => 'nullable|string|max:20',
        ],[
             'nama_ayah' => 'Nama Ayah harus diisi ',
            'tempat_lahir_ayah' => 'Tempat lahir Harus Diisi',
            'tanggal_lahir_ayah' => 'Tanggal Lahir harus diisi',
            'pendidikan_ayah' => 'pendidikan Ayah Harus diisi',
            'pekerjaan_ayah' => 'Pekerjaan Ayah Harus diisi',
            'penghasilan_ayah' => 'Penghasilan Ayah Harus disi',
            'no_hp_ayah' => 'No hp ayah Harus diisi',

            // Ibu
            'nama_ibu' => 'Nama ibu Harus diisi',
            'tempat_lahir_ibu' => 'Tempat Lahir ibu Harus diisi',
            'tanggal_lahir_ibu' => 'Tanggal Lahir ibu Harus diisi',
            'pendidikan_ibu' => 'Pendidikan Ibu Harus Diisi',
            'pekerjaan_ibu' => 'Pekerjaan ibu Harus Diisi',
            'penghasilan_ibu' => 'Penghasilan Ibu Harus Diisi',
            'no_hp_ibu' => 'No hp ibu harus disis',

            // Wali
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_wali' => 'nullable|string|max:100',
            'alamat_wali' => 'nullable|string|max:500',
            'no_hp_wali' => 'nullable|string|max:20',
        ]);

        // Simpan AYAH
        $ayah = DataAyah::create([
            'user_id' => auth()->id(),
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'no_hp_ayah' => $request->no_hp_ayah,
        ]);

        // Simpan IBU
        $ibu = DataIbu::create([
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

        // Simpan WALI (jika diisi)
        $wali = null;
        if ($request->filled('nama_wali')) {
            $wali = DataWali::create([
                'user_id' => auth()->id(),
                'nama_wali' => $request->nama_wali,
                'hubungan_wali' => $request->hubungan_wali,
                'alamat_wali' => $request->alamat_wali,
                'no_hp_wali' => $request->no_hp_wali,
            ]);
        }

        // ⬇⬇⬇ Wajib! Simpan ke data_keluargas ⬇⬇⬇
        DataKeluarga::create([
            'user_id'      => auth()->id(),
            'data_ayah_id' => $ayah->id,
            'data_ibu_id'  => $ibu->id,
            'data_wali_id' => $wali ? $wali->id : null,
        ]);

        return redirect()->route('user.datakeluargas.index')
            ->with('success', 'Data keluarga berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $userId = auth()->id();

        $data_ayahs = DataAyah::where('user_id', $userId)->first();
        $data_ibus = DataIbu::where('user_id', $userId)->first();
        $data_walis = DataWali::where('user_id', $userId)->first();

        return view('user.datakeluarga.edit', compact('data_ayahs', 'data_ibus', 'data_walis'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = auth()->id();

        // Validasi
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'nullable|string|max:255',
            'tanggal_lahir_ayah' => 'nullable|date',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|numeric',
            'no_hp_ayah' => 'nullable|string|max:20',
            'alamat_ayah' => 'nullable|string|max:255',

            // IBU
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'nullable|string|max:255',
            'tanggal_lahir_ibu' => 'nullable|date',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|numeric',
            'no_hp_ibu' => 'nullable|string|max:20',
            'alamat_ibu' => 'nullable|string|max:255',

            // WALI (opsional)
            'nama_wali' => 'nullable|string|max:255',
            'hubungan_wali' => 'nullable|string|max:255',
            'alamat_wali' => 'nullable|string|max:255',
            'no_hp_wali' => 'nullable|string|max:20',
        ]);


        // Update Ayah
        DataAyah::where('user_id', $userId)->update([
            'user_id' => auth()->id(),
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'no_hp_ayah' => $request->no_hp_ayah,
        ]);

        // Update Ibu
        DataIbu::where('user_id', $userId)->update([
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

        // Update Wali jika ada
        if ($request->filled('nama_wali')) {
            DataWali::where('user_id', $userId)->update([
                'user_id' => auth()->id(),
                'nama_wali' => $request->nama_wali,
                'hubungan_wali' => $request->hubungan_wali,
                'alamat_wali' => $request->alamat_wali,
                'no_hp_wali' => $request->no_hp_wali,
            ]);
        }

        return redirect()->route('user.datakeluargas.index')->with('success', 'Data keluarga berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */

}
