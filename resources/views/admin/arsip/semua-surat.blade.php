@extends('admin.master.layout')
@section('halaman', 'Pengarsipan Surat')
@section('content')
    {{-- @include('include.alert') --}}
    @if ($message = Session::get('success'))
        <div class="bs-toast toast fade show bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Bootstrap</div>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
            </div>
        </div>
    @endif
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Surat Masuk/Keluar</th>
                        <th>Kategori Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($semuaSurat as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nomor_surat }}</td>
                            <td>{{ $data->nama_surat }}</td>
                            <td>{{ $data->tanggal_surat }}</td>
                            <td>{{ $data->jenis->nama }}</td>
                            <td>{{ $data->kategori->nama }}</td>
                            <td>
                                <form action="{{ route('arsip.delete', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" id="{{ $data->id }}"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
