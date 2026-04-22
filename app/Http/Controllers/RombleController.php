<?php

namespace App\Http\Controllers;

use App\Models\Romble;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RombleExport;

class RombleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombles = Romble::all();
        return view('admin.romble.index',compact('rombles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.romble.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nama_romble' =>'required',
            'tingkat' => 'required'
        ],[
            'nama_romble.required'=> 'Nama Rombel Harus diisi',
            'tingkat.required' => 'Nama Tingkatan Harus diisi'
        ]);
        $createData = Romble::create([
            'nama_romble' => $request->nama_romble,
            'tingkat' =>$request->tingkat
        ]);
        if ($createData){
            return redirect()->route('admin.rombles.index')->with('success','Berhasil Menambahkan Data!');
        }else{
            return redirect()->back()->with('error','Gagal Menambakan Data Coba lagi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Romble $romble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $romble = Romble::find($id);
        return view('admin.romble.edit',compact('romble'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Romble $romble,$id)
    {
         $request ->validate([
            'nama_romble' =>'required',
            'tingkat' => 'required'
        ],[
            'nama_romble.required'=> 'Nama Rombel Harus diisi',
            'tingkat.required' => 'Nama Tingkatan Harus diisi'
        ]);
        $updateData = Romble::where('id',$id)->update([
            'nama_romble' => $request->nama_romble,
            'tingkat' => $request->tingkat
        ]);
        if($updateData){
            return redirect()->route('admin.rombles.index')->with('success','Berhasil Mnegubah Data!');
        }else{
            return redirect()->back()->with('error','Gagal Mengubah data ,Coba Lagi');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteData = Romble::where('id',$id)->delete();
        if($deleteData){
            return redirect()->route('admin.rombles.index')->with('success','Berhasil Menghapus data');
        }else{
            return redirect()->back()->with('error','Gagal Menghapus Data');
        }
    }
     public function trash()
    {
        $rombles = Romble::onlyTrashed()->get();
        return view('admin.romble.trash',compact('rombles'));
    }
    public function restore($id)
    {
        $romble = Romble::onlyTrashed()->find($id);
        $romble -> restore();
        return redirect()->route('admin.rombles.index')->with('success', 'Berhasil Mengembalikan data!');
    }
    public function deletePermanent($id)
    {
        $romble = Romble::onlyTrashed()->find($id);
        $romble ->forceDelete();
        return redirect()->back()->with('success','Berhasil Menghapus Data!');
    }
    public function exportExcel()
    {
        $fileName = 'data-Romble.xlsx';
        return Excel::download(new RombleExport, $fileName);
    }
}
