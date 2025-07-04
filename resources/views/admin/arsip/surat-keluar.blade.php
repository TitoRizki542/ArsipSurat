@extends('admin.master.layout')
@section('halaman', 'Surat Masuk')
@section('content')
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Bidang Surat</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($suratKeluar as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nomor_surat }}</td>
                            <td>{{ $data->nama_surat }}</td>
                            <td>{{ $data->tanggal_surat }}</td>
                            <td>{{ $data->bidang->nama }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
