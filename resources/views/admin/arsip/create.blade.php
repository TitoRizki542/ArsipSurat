@extends('admin.master.layout')
@section('halaman', 'Tambahkan Arsip Surat')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <h5 class="card-header">Lengkapi Data Surat</h5>
                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="nama_surat" class="col-md-3 col-form-label">Nama Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nama_surat" type="text"
                                    placeholder="Masukan nama surat" id="nama_surat" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nomor_surat" class="col-md-3 col-form-label">Nomor Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nomor_surat" type="text"
                                    placeholder="Masukan nomor surat" id="nomor_surat" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal_surat" class="col-md-3 col-form-label">Tanggal Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tanggal_surat" type="date" id="tanggal_surat" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Jenis Surat</label>
                            <div class="col-md-9">
                                <select class="form-select" name="jenis_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected disabled> -- Pilih Salah Satu -- </option>
                                    @foreach ($dataJenis as $data)
                                        <option value="{{ $data->id }}">{{ $loop->iteration }}.
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Kategori Surat</label>
                            <div class="col-md-9">
                                <select class="form-select" name="kategori_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected disabled> -- Pilih Salah Satu -- </option>
                                    @foreach ($dataKategori as $data)
                                        <option value="{{ $data->id }}">{{ $loop->iteration }}.
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Isi Surat</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="isi_surat" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Masukan ringkasan isi surat"></textarea>
                            </div>
                        </div>
                        <div class="mb-3
                                    row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">File Surat</label>
                            <div class="col-md-9">
                                <input class="form-control mb-2" name="file_surat" type="file" id="formFile" />
                                <label for="formFile">*file yang diizinkan .pdf</label>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
