@extends('templates.app')

@section('content')
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">

    <!-- Breadcrumb -->
    <div class="d-flex align-items-center mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">Admin</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold">Data Rombel</li>
            </ol>
        </nav>
    </div>

    <!-- Alert Success -->
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ Session::get('success') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card Container -->
    <div class="card shadow border-0">
        <!-- Card Header -->
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="fas fa-graduation-cap me-2"></i>Data Rombel
                    </h5>
                </div>
                <div class="col-md-6 text-end">
                     <a href="{{ route('admin.rombles.trash') }}" class="btn btn-secondary me-2">Data SAMPAH</a>
                                <a href="{{ route('admin.rombles.export') }}"
                                    class="btn btn-secondary me-2">Export(.xlsx)</a>
                    <a href="{{ route('admin.rombles.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i>Tambah Data
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>Nama Rombel</th>
                            <th>Tingkatan</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rombles as $index => $item)
                            <tr>
                                <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-book text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $item['nama_romble'] }}</div>
                                            <small class="text-muted">ID: JRS-{{ str_pad($item['id'], 3, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary fs-6">{{ $item['tingkat'] }}</span>
                                </td>
                               <td class="text-center align-middle">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.rombles.edit', $item->id) }}" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('admin.rombles.delete', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <p class="mb-0">Belum ada data Rombel</p>
                                        <small>Silakan tambah Rombel baru dengan tombol di atas</small>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        @if($rombles->count() > 0)
        <div class="card-footer bg-white">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small class="text-muted">
                        Menampilkan {{ $rombles->count() }} dari {{ $rombles->count() }} Romble
                    </small>
                </div>
                <div class="col-md-6">
                    <!-- Pagination bisa ditambahkan di sini jika diperlukan -->
                    <nav aria-label="Page navigation" class="float-end">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-4">
        <a href="#" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    .table th {
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        padding: 15px 12px;
    }

    .table td {
        padding: 15px 12px;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
        transform: translateY(-1px);
    }

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .badge {
        font-size: 0.85em;
        padding: 0.5em 0.75em;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
    }

    .breadcrumb-item.active {
        color: #2c5aa0;
    }

    .alert {
        border: none;
        border-radius: 8px;
        border-left: 4px solid;
    }

    .alert-success {
        border-left-color: #198754;
        background-color: rgba(25, 135, 84, 0.1);
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Auto-hide success alert after 5 seconds
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(successAlert);
                bsAlert.close();
            }, 5000);
        }
    });
</script>
@endpush
