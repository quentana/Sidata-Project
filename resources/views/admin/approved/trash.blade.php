@extends('templates.app')

@section('content')
    <x-navbar></x-navbar>

    <div class="p-4 sm:ml-64" style="margin-left: 250px; padding: 20px;">
        <h3>Data Sampah (Trash)</h3>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <div class="card-header d-flex align-items-center">
            <a href="{{ route('admin.approve.index') }}" class="btn btn-primary mb-3 ms-auto">Kembali</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Dihapus Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datasampah as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->datasiswa->name ?? '-' }}</td>
                        <td>{{ $row->datasiswa->Email ?? '-' }}</td>
                        <td>{{ $row->deleted_at }}</td>

                        <td class="d-flex gap-2">
                            <form action="{{ route('admin.approve.restore', $row->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-success btn-sm">Pulihkan</button>
                            </form>

                            <form action="{{ route('admin.approve.delete_permanent', $row->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
