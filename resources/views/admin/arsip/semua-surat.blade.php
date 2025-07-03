@extends('admin.master.layout')
@section('halaman', 'Pengarsipan Surat')
@section('content')
    @include('include.alert')

    <form action="{{ route('semua.surat') }}" method="GET">
        <div class="row">
            <div class="col-md-4 mb-3 d-flex gap-2">
                <input type="text" class="form-control" placeholder="Cari.." aria-label="Cari.." name="cari" />
                <button class="btn btn-primary" type="submit" id="cari">Cari</button>
                <a href="{{ 'semua.surat' }}" class="btn btn-info">Kembali</a>
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
                                    <button class="btn btn-danger btn-md" type="submit" id="{{ $data->id }}"><i
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
