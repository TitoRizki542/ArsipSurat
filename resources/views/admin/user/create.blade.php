@extends('admin.master.layout')
@section('halaman', 'Tambah Pengguna ')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="basic-default-name"
                                    placeholder="Masukan nama pengguna" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email </label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="basic-default-name"
                                    placeholder="Masukan email pengguna" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat </label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" class="form-control" id="basic-default-name"
                                    placeholder="Masukan alamat pengguna" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">No Hp </label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor_hp" class="form-control" id="basic-default-name"
                                    placeholder="Masukan nomor Hp pengguna" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                                <select class="form-select" name="jenis_kelamin" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="laki laki">Laki Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Bidang Pengguna</label>
                            <div class="col-md-10">
                                <select class="form-select" name="bidang_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Pilih Salah Satu</option>
                                    @foreach ($dataBidang as $bidang)
                                        <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username </label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="basic-default-name"
                                    placeholder="Masukan username pengguna" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Password </label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control" id="basic-default-name"
                                    placeholder="Masukan password pengguna" />
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
    </div>
@endsection
