<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approved;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;


class ApprovedController extends Controller
{
    /**
     * Membuat data approved untuk user.
     */
    public function home()
    {
        // format pencarian data : where('colum,'operator','value')
        // jika Operatto ==/= operator Bisa TIDAK DITULIS
        // operator yang digunakan  : <kurang dari | > lebih dari | <> tidak sama dengan
        // format mengurutkan data : orderBY(''colum','DESC/ASC')-> DESC z-a/9-0, ASC a-z/0-9
        // get() : mengambil seluruh data  HASIL FILTER
        $approveds = Approved::where('actived', 1)->orderBy('created_at', 'DESC')->get();
        return view('home', compact('approveds'));
    }
    public function store(Request $request)
    {
        $approved = Approved::withTrashed()
            ->where('user_id', auth()->id())
            ->first();

        if ($approved && $approved->trashed()) {

            // Restore Approved
            $approved->restore();

            // Restore Datasiswa
            $approved->datasiswa()->withTrashed()->restore();

            // Restore keluarga & turunannya
            if ($approved->datasiswa) {
                $approved->datasiswa->keluarga()->withTrashed()->restore();

                $approved->datasiswa->keluarga->ayah()->withTrashed()->restore();
                $approved->datasiswa->keluarga->ibu()->withTrashed()->restore();
                $approved->datasiswa->keluarga->wali()->withTrashed()->restore();

                // Restore document
                $approved->datasiswa->document()->withTrashed()->restore();
            }
        }

        // Update data baru
        $approved->update([
            'status' => 'dikirim ulang'
        ]);

        return back()->with('success', 'Data lama dipulihkan & data baru berhasil dikirim.');
    }


    /**
     * Menampilkan semua Approved (opsional, untuk admin).
     */
    public function index()
    {
        $userId = auth()->id();

        $approved = Approved::with([
            'datasiswa.jurusan',
            'datasiswa.rayon',
            'datasiswa.romble'
        ])->get();

        return view('admin.approved.index', compact('approved'));
    }


    /**
     * Update status (opsional untuk admin)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);

        $approved = Approved::findOrFail($id);
        $approved->status = $request->status;
        $approved->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    // public function destroy($id)
    // {
    //     $deleteData = Approved::where('id', $id)->delete();
    //     if ($deleteData) {
    //         return redirect()->route('admin.approve.index')->with('success', 'Berhasil Menghapus Data');
    //     } else {
    //         return redirect()->back()->with('failed', 'Gagal! Silahkan coba Lagi');
    //     }
    // }
    public function datatables()
    {
        $data = Approved::with('user')->get();

        return DataTables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->user->name ?? '-';
            })
            ->addColumn('email', function ($row) {
                return $row->user->email ?? '-';
            })
            ->addColumn('status_badge', function ($row) {
                if ($row->status == 'diterima') {
                    return '<span class="badge bg-success">Diterima</span>';
                } elseif ($row->status == 'ditolak') {
                    return '<span class="badge bg-danger">Ditolak</span>';
                } else {
                    return '<span class="badge bg-warning text-dark">Menunggu</span>';
                }
            })
            ->addColumn('action', function ($row) {

                $btnDetail = '<a href="' . route('admin.approve.show', $row->id) . '"
                   class="btn btn-info btn-sm">Detail</a>';

                $btnDelete = ' <form class="me-2" action="' . route(
                    'admin.approve.delete',
                    $row['id']
                ) . '" method="POST">' .
                    csrf_field() .
                    method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger me-2">Hapus</button>
                    </form>';
                $btnNonaktif = '';
                if ($row->actived == 1) {
                    $btnNonaktif = '<form class="me-2" action="' . route('admin.approve.nonaktif', $row['id']) . '" method="POST">' .
                        csrf_field() .
                        method_field('PUT') .
                        '<button type="sumbit" class="btn btn-warning me-2">Non-Aktifkan Film</a>
                    </form>';
                }
                return '<div class="d-flex justify-content-center">' . $btnDetail . $btnDelete . $btnNonaktif . '</div>';
            })

            ->rawColumns(['status_badge', 'action'])
            ->make(true);
    }
    public function show($id)
    {
        $data = Approved::with([
            'user',
            'datasiswa.jurusan',
            'datasiswa.rayon',
            'datasiswa.romble',
            'datasiswa.keluarga.ayah',
            'datasiswa.keluarga.ibu',
            'datasiswa.keluarga.wali'
        ])->findOrFail($id);

        return view('admin.approved.show', compact('data'));
    }
    public function exportPdf($showId)
    {
        $data = Approved::with([
            'datasiswa.jurusan',
            'datasiswa.rayon',
            'datasiswa.romble',
            'datasiswa.keluarga.ayah',
            'datasiswa.keluarga.ibu',
            'datasiswa.keluarga.wali',
            'datasiswa.document'
        ])
            ->findOrFail($showId);

        $pdf = Pdf::loadView('admin.approved.pdf', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('Detail_Siswa_' . $data->datasiswa->name . '.pdf');
    }


    public function approve($id)
    {
        $data = Approved::findOrFail($id);
        $data->status = 'diterima';
        $data->save();

        return back()->with('success', 'Data telah diterima.');
    }

    public function reject($id)
    {
        $data = Approved::findOrFail($id);
        $data->status = 'ditolak';
        $data->save();

        return back()->with('error', 'Data telah ditolak.');
    }

    public function destroy($id)
    {
        $approved = Approved::with([
            'datasiswa.keluarga.ayah',
            'datasiswa.keluarga.ibu',
            'datasiswa.keluarga.wali',
            'datasiswa.document'
        ])->findOrFail($id);

        // Soft delete anak-anak dulu
        if ($approved->datasiswa) {

            // Document
            $approved->datasiswa->document()->delete();

            // Keluarga
            if ($approved->datasiswa->keluarga) {
                $approved->datasiswa->keluarga->ayah()->delete();
                $approved->datasiswa->keluarga->ibu()->delete();
                $approved->datasiswa->keluarga->wali()->delete();
                $approved->datasiswa->keluarga()->delete();
            }

            // Datasiswa
            $approved->datasiswa()->delete();
        }

        // Approved (induk)
        $approved->delete();

        return back()->with('success', 'Data berhasil dipindahkan ke data sampah.');
    }


    public function trash()
    {
        $datasampah = Approved::onlyTrashed()->get();
        return view('admin.approved.trash', compact('datasampah'));
    }

    public function restore($id)
    {
        Approved::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.approve.trash')->with('success', 'Data berhasil dipulihkan!');
    }

    public function deletePermanent($id)
    {
        Approved::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('admin.approve.trash')->with('success', 'Data berhasil dihapus permanen!');
    }


}
