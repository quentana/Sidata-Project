@extends('templates.app')
@section('content')
    <x-navbar></x-navbar>
    <div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">
                    @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <div class="d-flex justify-content-end">
            @if ($documents->isEmpty())
                <a href="{{ route('user.documents.create') }}" class="btn btn-success">Tambah Data</a>
            @endif
        </div>

        @csrf
        <h5>Document Murid</h5>
        <div class="table-responsive">
            @foreach ($documents as $key => $document)
                <table class="table table-bordered mb-4">
                    <tr class="table-primary text-center">
                        <th colspan="2">Dokumen {{ $key + 1 }}</th>
                    </tr>

                    <tr>
                        <th style="width: 200px;">Akte Kelahiran</th>
                        <td class="text-center">
                            @if (!empty($document->akte_Kelahiran))
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('storage/' . $document->akte_Kelahiran) }}"
                                        class="document-thumbnail rounded border mb-2" width="150px" alt="Akte Kelahiran"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                                    <div class="file-placeholder" style="display: none;">
                                        <i class="fas fa-file-image text-muted"></i>
                                        <div><small class="text-muted">Gagal</small></div>
                                    </div>

                                    <small class="text-muted">{{ basename($document->akte_Kelahiran) }}</small>
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-file-upload"></i>
                                    <div><small>Belum upload</small></div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Kartu Keluarga</th>
                        <td class="text-center">
                            @if (!empty($document->kartu_Keluarga))
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('storage/' . $document->kartu_Keluarga) }}"
                                        class="document-thumbnail rounded border mb-2" width="150px" alt="Kartu Keluarga"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="file-placeholder" style="display: none;">
                                        <i class="fas fa-file-image text-muted"></i>
                                        <div><small class="text-muted">Gagal</small></div>
                                    </div>
                                    <small class="text-muted">{{ basename($document->kartu_Keluarga) }}</small>
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-file-upload"></i>
                                    <div><small>Belum upload</small></div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>KTP Ayah</th>
                        <td class="text-center">
                            @if (!empty($document->KTP_ayah))
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('storage/' . $document->KTP_ayah) }}"
                                        class="document-thumbnail rounded border mb-2" width="150px" alt="KTP Ayah"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="file-placeholder" style="display: none;">
                                        <i class="fas fa-file-image text-muted"></i>
                                        <div><small class="text-muted">Gagal</small></div>
                                    </div>
                                    <small class="text-muted">{{ basename($document->KTP_ayah) }}</small>
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-file-upload"></i>
                                    <div><small>Belum upload</small></div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>KTP Ibu</th>
                        <td class="text-center">
                            @if (!empty($document->KTP_Ibu))
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('storage/' . $document->KTP_Ibu) }}"
                                        class="document-thumbnail rounded border mb-2" width="150px" alt="KTP Ibu"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="file-placeholder" style="display: none;">
                                        <i class="fas fa-file-image text-muted"></i>
                                        <div><small class="text-muted">Gagal</small></div>
                                    </div>
                                    <small class="text-muted">{{ basename($document->KTP_Ibu) }}</small>
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-file-upload"></i>
                                    <div><small>Belum upload</small></div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Aksi</th>
                        <td>
                            <a href="{{ route('user.documents.edit', $document->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            {{-- <form action="{{ route('user.documents.destroy', $document->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                </table>
            @endforeach

            @if (count($documents) == 0)
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-folder-open fa-3x mb-3"></i>
                    <h5 class="mb-2">Belum ada data dokumen</h5>
                    <p class="mb-0">Silakan tambah dokumen baru untuk memulai</p>
                </div>
            @endif

        </div>
    </div>
@endsection
