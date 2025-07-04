@extends('admin.master.layout')
@section('halaman', 'Pengarsipan Surat')
@section('content')
    @include('include.alert')

    <form action="{{ route('semua.surat') }}" method="GET">
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
                        <th>Surat Masuk/Keluar</th>
                        <th>Bidang Surat</th>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            let query = $(this).val();

            $.ajax({
                url: "/search-surat",
                type: "GET",
                data: {
                    search: query
                },
                success: function(data) {
                    let rows = "";
                    $.each(data, function(index, item) {
                        rows += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.nomor_surat}</td>
                            <td>${item.nama_surat}</td>
                            <td>${item.tanggal_surat}</td>
                            <td>${item.jenis_surat}</td>
                            <td>${item.kategori_surat}</td>
                        </tr>`;
                    });
                    $("#surat-table").html(rows);
                }
            });
        });
    });
</script>
