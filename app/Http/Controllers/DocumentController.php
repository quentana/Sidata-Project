<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::where('user_id', auth()->id())->get();
        return view('user.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'akte_kelahiran' => 'required|mimes:jpeg,png,jpg,svg',
            'kartu_keluarga' => 'required|mimes:jpeg,png,jpg,svg',
            'KTP_Ayah' => 'required|mimes:jpeg,png,jpg,svg',
            'KTP_Ibu' => 'required|mimes:jpeg,png,jpg,svg'
        ], [
            'akte_kelahiran.required' => 'Document harus diisi',
            'akte_kelahiran.mimes' => 'Document Harus tipe(jpeg/jpg/png/svg)',
            'kartu_keluarga.required' => 'Document Harus diisi',
            'kartu_keluarga.mimes' => 'Document Harus tipe(jpeg/jpg/png/svg)',
            'KTP_Ayah.required' => 'Document Harus di uplod',
            'KTP_ayah.mimes' => 'Document  Harus tipe(jpeg/jpg/png/svg)',
            'KTP_Ibu.required' => 'Document Harus Diisi',
            'KTP_Ibu.mimes' => 'Document  Harus tipe(jpeg/jpg/png/svg)'
        ]);
        // AKTE KELAHIRAN
        $fileAkte = $request->file('akte_kelahiran');
        $fileNameAkte = 'Akte_Kelahiran-' . Str::random(10) . '.' . $fileAkte->getClientOriginalExtension();
        $pathAkte = $fileAkte->storeAs('Akte_Kelahiran', $fileNameAkte, 'public');

        // KARTU KELUARGA
        $fileKK = $request->file('kartu_keluarga');
        $fileNameKK = 'Kartu_keluarga-' . Str::random(10) . '.' . $fileKK->getClientOriginalExtension();
        $pathKK = $fileKK->storeAs('Kartu_keluarga', $fileNameKK, 'public');

        // KTP AYAH
        $fileAyah = $request->file('KTP_Ayah');
        $fileNameAyah = 'KTP_Ayah-' . Str::random(10) . '.' . $fileAyah->getClientOriginalExtension();
        $pathAyah = $fileAyah->storeAs('KTP_Ayah', $fileNameAyah, 'public');

        // KTP IBU
        $fileIbu = $request->file('KTP_Ibu');
        $fileNameIbu = 'KTP_Ibu-' . Str::random(10) . '.' . $fileIbu->getClientOriginalExtension();
        $pathIbu = $fileIbu->storeAs('KTP_Ibu', $fileNameIbu, 'public');


        $createData = Document::create([
            'user_id' => auth()->id(), // <== ini penting
            'akte_Kelahiran' => $pathAkte,
            'kartu_Keluarga' => $pathKK,
            'KTP_ayah' => $pathAyah,
            'KTP_Ibu' => $pathIbu,
        ]);

        if ($createData) {
            return redirect()->route('user.documents.index')->with('success', 'Berhasil menambahkan Document');
        } else {
            return redirect()->back()->with('error', 'Gagal Menambahkan Document!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $document = Document::find($id);
        return view('user.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             'akte_kelahiran' => 'required|mimes:jpeg,png,jpg,svg',
            'kartu_keluarga' => 'required|mimes:jpeg,png,jpg,svg',
            'KTP_Ayah' => 'required|mimes:jpeg,png,jpg,svg',
            'KTP_Ibu' => 'required|mimes:jpeg,png,jpg,svg'
        ], [
            'akte_kelahiran.required' => 'Document harus diisi',
            'akte_kelahiran.mimes' => 'Document Harus tipe(jpeg/jpg/png/svg)',
            'kartu_keluarga.required' => 'Document Harus diisi',
            'kartu_keluarga.mimes' => 'Document Harus tipe(jpeg/jpg/png/svg)',
            'KTP_Ayah.required' => 'Document Harus di uplod',
            'KTP_ayah.mimes' => 'Document  Harus tipe(jpeg/jpg/png/svg)',
            'KTP_Ibu.required' => 'Document Harus Diisi',
        ]);

        $document = Document::findOrFail($id);

        $updateData = [];

        if ($request->hasFile('akte_kelahiran')) {
            $file = $request->file('akte_kelahiran');
            $updateData['akte_kelahiran'] =
            $file->storeAs('akte_Kelahiran', 'Akte-' . Str::random(10) . '.' . $file->extension(), 'public');
        }

        if ($request->hasFile('kartu_keluarga')) {
            $file = $request->file('kartu_keluarga');
            $updateData['kartu_keluarga'] =
            $file->storeAs('kartu_Keluarga', 'KK-' . Str::random(10) . '.' . $file->extension(), 'public');
        }

        if ($request->hasFile('KTP_Ayah')) {
            $file = $request->file('KTP_Ayah');
            $updateData['KTP_Ayah'] =
            $file->storeAs('KTP_Ayah', 'KTP_Ayah-' . Str::random(10) . '.' . $file->extension(), 'public');
        }

        if ($request->hasFile('KTP_Ibu')) {
            $file = $request->file('KTP_Ibu');
            $updateData['KTP_Ibu'] =
            $file->storeAs('KTP_Ibu', 'KTP_Ibu-' . Str::random(10) . '.' . $file->extension(), 'public');
        }

        $document->update($updateData);

        return redirect()->route('user.documents.index')->with('success', 'Dokumen berhasil diperbarui');
    }



}
