@extends('admin.master.layout')
@section('halaman', 'Kelola Pengguna')
@section('content')
    @include('include.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">
                    <a href="{{ route('pengguna.create') }}" class="btn rounded-pill btn-primary">
                        <i class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Data
                    </a>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Nomor Hp</th>
                                <th>Bidang</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($dataUser as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->bidang->nama }}</td>
                                    <td>{{ $data->nomor_hp }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('pengguna.delete', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <span class="tf-icons bx bx-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">

            </div>
        </div>
    </div>
@endsection
