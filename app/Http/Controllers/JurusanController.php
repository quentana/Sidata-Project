<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Exports\JurusanExport;
use Maatwebsite\Excel\Facades\Excel;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required'
        ], [
            'nama_jurusan.required' => 'Nama Jurusan Harus disi',
            'kode_jurusan.required' => 'Kode harus Diisi'
        ]);

        $createData =Jurusan::create([
            'nama_jurusan'=> $request->nama_jurusan,
            'kode_jurusan'=> $request->kode_jurusan
        ]);

        if($createData){
            return redirect()->route('admin.jurusans.index')->with('success', 'Berhasil Memasukan Data ');
        }else{
            return redirect()->back()->with('error','Gagal! Silahkan Coba Ulang ');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('admin.jurusan.edit',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan,$id)
    {
          $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required'
        ], [
            'nama_jurusan.required' => 'Nama Jurusan Harus disi',
            'kode_jurusan.required' => 'Kode harus Diisi'
        ]);

        $updateData = Jurusan::Where('id',$id)->update([
            'nama_jurusan' => $request->nama_jurusan,
            'kode_jurusan' => $request->kode_jurusan
        ]);
        if($updateData){
            return redirect()->route('admin.jurusans.index')->with('success','Berhasil Mengubah Data');
        }else{
            return redirect()->back()->with('error','Gagal! Silahkan coba lagi ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteData = Jurusan::where('id',$id)->delete();
        if($deleteData){
            return redirect()->route('admin.jurusans.index')->with('success','Berhasil Menghapus Data');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }

    public function trash()
    {
        $jurusans = Jurusan::onlyTrashed()->get();
        return view('admin.jurusan.trash',compact('jurusans'));
    }
    public function restore($id)
    {
        $jurusan = Jurusan::onlyTrashed()->find($id);
        $jurusan -> restore();
        return redirect()->route('admin.jurusans.index')->with('success', 'Berhasil Mengembalikan data!');
    }
    public function deletePermanent($id)
    {
        $jurusan = Jurusan::onlyTrashed()->find($id);
        $jurusan ->forceDelete();
        return redirect()->back()->with('success','Berhasil Menghapus Data!');
    }
    public function exportExcel()
    {
        $fileName = 'data-jurusan.xlsx';
        return Excel::download(new JurusanExport, $fileName);
    }

}
