<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\DataSiswa;
use App\Models\Jurusan;
use App\Models\Romble;
use App\Models\Rayon;
use App\Exports\DataSiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Approved;


class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_siswas = DataSiswa::where('user_id', auth()->id())->get();
           $status = auth()->user()->approved->status ?? 'belum mengisi';

        return view('user.datasiswa.index', compact('data_siswas','status'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.datasiswa.create', [
            'jurusans' => Jurusan::all(),   // ⬅ ini wajib
            'rayons' => Rayon::all(),
            'rombles' => Romble::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'Tanggal_Lahir' => 'required|date',
            'Tempat_Lahir' => 'required|string|max:255',
            'No_Hp' => 'required|string|max:20',
            'Nis' => 'required|string|max:50|unique:data_siswas,nis',
            'Email' => 'required|email|max:255',
            'Jenis_kelamin' => 'required|string',
            'Tinggi_badan' => 'required|integer',
            'Berat_badan' => 'required|integer',
            'No_Ijaza_Sd' => 'required|string',
            'No_Ijaza_Smp' => 'required|string',
            'Rt' => 'required|string',
            'Rw' => 'required|string',
            'Kelurahan' => 'required|string',
            'Kecamatan' => 'required|string',
            'Provinsi' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'rayon_id' => 'required|exists:rayons,id',
            'romble_id' => 'required|exists:rombles,id',



        ], [
            'name.required' => 'Nama siswa harus diisi',
            'Tanggal_Lahir.required' => 'Tanggal lahir wajib diisi',
            'Tempat_Lahir.required' => 'Tempat lahir wajib diisi',
            'No_Hp.required' => 'Nomor HP wajib diisi',
            'Nis.required' => 'NIS wajib diisi',
            'Email.required' => 'Email wajib diisi',
            'Jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'Tinggi_badan.required' => 'tinggi Badan Harus diis',
            'Berat_badan.required' => 'Berat Badan Harus diisi',
            'No_Ijaza_Sd.required' => 'No_ijaza Sd harus diisi',
            'No_Ijaza_Smp.required' => 'No ijaza Smp Harus diisi',
            'Rt.required' => 'Rt Harus diisi',
            'Rw.required' => 'Rw Harus diisi',
            'Kelurahan.required' => 'Kelurahan Harus disi',
            'Kecamatan.required' => 'Kecamatan Harus diisi',
            'Provinsi.required' => 'provinsi Harus diisi',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'rayon_id.required' => 'Rayon harus dipilih',
            'romble_id.required' => 'Romble harus dipilih',
        ]);

        $createData = DataSiswa::create([
            'name' => $request->name,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Tempat_Lahir' => $request->Tempat_Lahir,
            'No_Hp' => $request->No_Hp,
            'Nis' => $request->Nis,
            'Email' => $request->Email,
            'Jenis_kelamin' => $request->Jenis_kelamin,
            'Tinggi_badan' => $request->Tinggi_badan,
            'Berat_badan' => $request->Berat_badan,
            'No_Ijaza_Sd' => $request->No_Ijaza_Sd,
            'No_Ijaza_Smp' => $request->No_Ijaza_Smp,
            'Rt' => $request->Rt,
            'Rw' => $request->Rw,
            'Kelurahan' => $request->Kelurahan,
            'Kecamatan' => $request->Kecamatan,
            'Provinsi' => $request->Provinsi,
            'jurusan_id' => $request->jurusan_id,
            'rayon_id' => $request->rayon_id,
            'romble_id' => $request->romble_id,
            'user_id' => auth()->id(), // otomatis ambil user login
        ]);
        // Tambahkan Approved otomatis

        Approved::create([
            'user_id' => auth()->id(),
            'status' => 'menunggu',
        ]);



        if ($createData) {
            return redirect()->route('user.datasiswas.index')->with('success', 'Berhasil menambahkan data siswa!');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data, coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
    {
        $datasiswa = DataSiswa::find($id);
       return view('user.datasiswa.edit', [
        'datasiswa' => $datasiswa,
        'jurusans'  => Jurusan::all(),
        'rayons'    => Rayon::all(),
        'rombles'   => Romble::all(),
    ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'Tanggal_Lahir' => 'required|date',
            'Tempat_Lahir' => 'required|string|max:255',
            'No_Hp' => 'required|string|max:20',
            'Nis' => 'required|string|max:50',
            'Email' => 'required|email|max:255',
            'Jenis_kelamin' => 'required|string',
            'Tinggi_badan' => 'required|integer',
            'Berat_badan' => 'required|integer',
            'No_Ijaza_Sd' => 'required|string',
            'No_Ijaza_Smp' => 'required|string',
            'Rt' => 'required|string',
            'Rw' => 'required|string',
            'Kelurahan' => 'required|string',
            'Kecamatan' => 'required|string',
            'Provinsi' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'rayon_id' => 'required|exists:rayons,id',
            'romble_id' => 'required|exists:rombles,id',
        ]);
        $updateData = DataSiswa::where('id', $id)
            ->where('user_id', auth()->id())
            ->update([

                'name' => $request->name,
                'Tanggal_Lahir' => $request->Tanggal_Lahir,
                'Tempat_Lahir' => $request->Tempat_Lahir,
                'No_Hp' => $request->No_Hp,
                'Nis' => $request->Nis,
                'Email' => $request->Email,
                'Jenis_kelamin' => $request->Jenis_kelamin,
                'Tinggi_badan' => $request->Tinggi_badan,
                'Berat_badan' => $request->Berat_badan,
                'No_Ijaza_Sd' => $request->No_Ijaza_Sd,
                'No_Ijaza_Smp' => $request->No_Ijaza_Smp,
                'Rt' => $request->Rt,
                'Rw' => $request->Rw,
                'Kelurahan' => $request->Kelurahan,
                'Kecamatan' => $request->Kecamatan,
                'Provinsi' => $request->Provinsi,
                'jurusan_id' => $request->jurusan_id,
                'rayon_id' => $request->rayon_id,
                'romble_id' => $request->romble_id,
            ]);

        if ($updateData) {
            return redirect()->route('user.datasiswas.index')->with('success', 'Berhasil mengubah data siswa!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //    $deleteData = DataSiswa::where('id', $id)
    //         ->where('user_id', auth()->id())
    //         ->delete();
    //     if ($deleteData) {
    //         return redirect()->route('user.datasiswas.index')
    //             ->with('success', 'Berhasil menghapus data siswa!');
    //     } else {
    //         return redirect()->back()->with('error', 'Gagal menghapus data.');
    //     }
    // }

    /**
     * Export to Excel.
     */
    // public function exportExcel()
    // {
    //     $fileName = 'data-siswa.xlsx';
    //     return Excel::download(new DataSiswaExport, $fileName);
    // }

    /**
     * Trash data (soft delete).
     */
    // public function trash()
    // {
    //     $data_siswas = DataSiswa::onlyTrashed()->get();
    //     return view('user.datasiswa.trash', compact('data_siswas'));
    // }

    /**
     * Restore deleted data.
     */
    // public function restore($id)
    // {
    //     $datasiswa = DataSiswa::onlyTrashed()->find($id);
    //     $datasiswa->restore();
    //     return redirect()->route('user.datasiswas.index')
    //         ->with('success', 'Data siswa berhasil dikembalikan!');
    // }

    // /**
    //  * Permanently delete data.
    //  */
    // public function deletePermanent($id)
    // {
    //     $datasiswa = DataSiswa::onlyTrashed()->find($id);
    //     $datasiswa->forceDelete();
    //     return redirect()->back()->with('success', 'Data siswa berhasil dihapus permanen!');
    // }
    // public function keluarga()
    // {
    //     $siswa = Auth::user()->datasiswa;
    //     $keluarga = $siswa ? $siswa->keluarga()->with(['ayah', 'ibu', 'wali'])->first() : null;
    //     return view('user.datakeluarga.index', compact('keluarga'));
    // }


    /**
     * Datatables integration (optional).
     */
    // public function dataForDatatables()
    // {
    //     $data_siswas = DataSiswa::query();

    //     return DataTables::of($data_siswas)
    //         ->addIndexColumn()
    //         ->addColumn('buttons', function ($data) {
    //             $btnEdit = '<a href="' . route('user.datasiswas.edit', $data->id) . '" class="btn btn-primary me-2">Edit</a>';
    //             $btnDelete = '
    //                 <form action="' . route('user.datasiswas.destroy', $data->id) . '" method="POST" style="display:inline-block;">
    //                     ' . csrf_field() . method_field('DELETE') . '
    //                     <button type="submit" class="btn btn-danger">Hapus</button>
    //                 </form>';
    //             return '<div class="d-flex justify-content-center">' . $btnEdit . $btnDelete . '</div>';
    //         })
    //         ->rawColumns(['buttons'])
    //         ->make(true);
    // }
}
