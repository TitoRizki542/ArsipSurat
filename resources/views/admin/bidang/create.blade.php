@extends('admin.master.layout')
@section('halaman', 'Tambah Bidang Surat')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('bidang.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 mt-2">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="basic-default-name"
                                placeholder="Masukan nama bidang" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi bidang"
                                aria-describedby="basic-icon-default-message2"></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
