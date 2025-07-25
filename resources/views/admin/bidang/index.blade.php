@extends('admin.master.layout')
@section('halaman', 'Data Bidang ')
@section('content')
    @include('include.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">
                    <a href="{{ route('bidang.create') }}" class="btn rounded-pill btn-primary">
                        <i class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Data
                    </a>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Bidang</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($dataBidang as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Thumbnail Surat"
                                            width="120">
                                    </td>
                                    <td><strong>{{ $data->nama }}</strong></td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>
                                        <!-- Tombol untuk memunculkan modal -->
                                        <button type="button" class="btn btn-info rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $data->id }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('bidang.edit', $data->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="nama{{ $data->id }}"
                                                                    class="form-label">Nama</label>
                                                                <input type="text" id="nama{{ $data->id }}"
                                                                    name="nama" class="form-control"
                                                                    value="{{ $data->nama }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi{{ $data->id }}"
                                                                    class="form-label">Deskripsi</label>
                                                                <input type="text" id="deskripsi{{ $data->id }}"
                                                                    name="deskripsi" class="form-control"
                                                                    value="{{ $data->deskripsi }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi{{ $data->id }}"
                                                                    class="form-label">thumbnail</label>
                                                                <input type="file" name="thumbnail" class="form-control"
                                                                    accept="image/*">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('bidang.delete', $data->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-pill">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
