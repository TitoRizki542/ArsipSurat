@extends('admin.master.layout')
@section('halaman', 'Surat Masuk')
@section('content')
    @include('include.alert')

    <form action="{{ route('surat.masuk') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-6 d-flex gap-2">


                <!-- Input Pencarian -->

                <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}" />

                <!-- Dropdown Filter -->
                {{-- <select class="form-select" name="tag">
                    <option value="">-- Pilih Jenis Surat --</option>
                    @foreach ($dataJenis as $jenis)
                        <option value="{{ $jenis->nama }}" {{ request('tag') == $jenis->nama ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select> --}}

                <!-- Tombol Cari -->
                <button class="btn btn-primary" type="submit">Cari</button>

                <!-- Tombol Kembali -->
                <a href="{{ route('semua.surat') }}" class="btn btn-info">Kembali</a>
            </div>
        </div>
    </form>

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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($suratMasuk as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nomor_surat }}</td>
                            <td>{{ $data->nama_surat }}</td>
                            <td>{{ $data->tanggal_surat }}</td>
                            <td>{{ $data->bidang->nama }}</td>
                            <td>
                                <div class="row">
                                    <div class="d-flex gap-2">

                                        <form>
                                            <a href="{{ route('arsip.edit', $data->id) }}" class="btn btn-primary btn-lg"><i
                                                    class="fa-solid fa-pen"></i></a>
                                        </form>
                                        <form action="{{ route('arsip.delete', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-lg" type="submit"
                                                id="{{ $data->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                {{-- {{ route('arsip.edit', $data->id) }} --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
