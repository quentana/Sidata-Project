<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RayonExport;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::all();
        return view('admin.rayon.index',compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rayon' =>'required',
            'pembimbing' => 'required'
        ],[
            'nama_rayon.required' => 'Nama Rayon Harus Diisi',
            'pembimbing.required' => 'Nama Pembimbing Harus diisi !'
        ]);
        $createData = Rayon::create([
            'nama_rayon' => $request->nama_rayon,
            'pembimbing' => $request->pembimbing
        ]);
        if ($createData){
            return redirect()->route('admin.rayons.index')->with('success', 'Berhasil Memasukann data!');
        }else{
            return redirect()->back()->with('error','Gagal! Coba Masukan lagi datanya');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayon::find($id);
        return view('admin.rayon.edit',compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_rayon' => 'required',
            'pembimbing' => 'required'
        ],[
            'nama_rayon.required' => 'Nama Rayon Harus diisi',
            'pembimbing.required' => 'Nama pembimbing Harus diisi'
        ]);

        $updateData = Rayon::where('id',$id)->update([
            'nama_rayon' => $request->nama_rayon,
            'pembimbing' => $request->pembimbing
        ]);
        if($updateData){
            return redirect()->route('admin.rayons.index')->with('success','Berhasil Mengubah Data');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah Data Coba lagi');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteData = Rayon::where('id',$id)->delete();
        if($deleteData){
            return redirect()->route('admin.rayons.index')->with('success','Berhasil Menghapus Data');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
     public function trash()
    {
        $rayons = Rayon::onlyTrashed()->get();
        return view('admin.rayon.trash',compact('rayons'));
    }
    public function restore($id)
    {
        $rayon = Rayon::onlyTrashed()->find($id);
        $rayon -> restore();
        return redirect()->route('admin.rayons.index')->with('success', 'Berhasil Mengembalikan data!');
    }
    public function deletePermanent($id)
    {
        $rayon = Rayon::onlyTrashed()->find($id);
        $rayon ->forceDelete();
        return redirect()->back()->with('success','Berhasil Menghapus Data!');
    }

     public function exportExcel()
    {
        $fileName = 'data-Rayon.xlsx';
        return Excel::download(new RayonExport, $fileName);
    }
}
