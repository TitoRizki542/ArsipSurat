@extends('admin.master.layout')
@section('halaman', 'Pengarsipan Surat')
@section('content')
    @include('include.alert')
    <div class="card">
        <h5 class="card-header">
            <a href="{{ route('arsip.create') }}" class="btn rounded-pill btn-primary">
                <i class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Data
            </a>
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Surat Masuk/Keluar</th>
                        <th>Bidang Surat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($dataSurat as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nomor_surat }}</td>
                            <td>{{ $data->nama_surat }}</td>
                            <td>{{ $data->tanggal_surat }}</td>
                            <td>{{ $data->jenis->nama }}</td>
                            <td>{{ $data->bidang->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


