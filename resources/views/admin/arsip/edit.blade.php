@extends('admin.master.layout')
@section('halaman', 'Tambahkan Arsip Surat')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <h5 class="card-header">Lengkapi Data Surat</h5>
                <form action="{{ route('arsip.update', $semuaSurat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="nama_surat" class="col-md-3 col-form-label">Nama Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nama_surat" type="text"
                                    placeholder="Masukan nama surat" id="nama_surat"
                                    value="{{ old('nama_surat', $semuaSurat->nama_surat) }}"" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nomor_surat" class="col-md-3 col-form-label">Nomor Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nomor_surat" type="text"
                                    placeholder="Masukan nomor surat" id="nomor_surat"
                                    value="{{ old('nomor_surat', $semuaSurat->nomor_surat) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal_surat" class="col-md-3 col-form-label">Tanggal Surat</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tanggal_surat" type="date" id="tanggal_surat"
                                    value="{{ old('tanggal_surat', $semuaSurat->tanggal_surat) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Jenis Surat</label>
                            <div class="col-md-9">
                                <select class="form-select" name="jenis_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option disabled
                                        {{ old('jenis_id', $semuaSurat->jenis_id ?? '') == '' ? 'selected' : '' }}>
                                        -- Pilih Salah Satu --
                                    </option>
                                    @foreach ($dataJenis as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('jenis_id', $semuaSurat->jenis_id ?? '') == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Bidang Surat</label>
                            <div class="col-md-9">
                                <select name="bidang_id" class="form-select">
                                    <option disabled
                                        {{ old('jenis_id', $semuaSurat->bidang ?? '') == '' ? 'selected' : '' }}>-- Pilih
                                        Jenis Surat --</option>
                                    @foreach ($dataBidang as $bidang)
                                        <option value="{{ $bidang->id }}"
                                            {{ old('jenis_id', $semuaSurat->bidang_id ?? '') == $bidang->id ? 'selected' : '' }}>
                                            {{ $bidang->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Isi Surat</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="isi_surat" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Masukan ringkasan isi surat">{{ old('isi_surat', $semuaSurat->isi_surat) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3
                                    row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">File Surat</label>
                            <div class="col-md-9">
                                <input class="form-control mb-2" name="file_surat" type="file" id="formFile" />
                                @if (isset($semuaSurat) && $semuaSurat->file_surat)
                                    <small>File Sudah ada: <a href="{{ asset('storage/' . $semuaSurat->file_surat) }}"
                                            target="_blank">Lihat file</a></small>
                                @endif
                                @error('file_surat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
