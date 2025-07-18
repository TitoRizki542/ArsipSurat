@extends('user.surat.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Arsip Surat Bidang {{ $bidang }}
            </h4>
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                <li class="breadcrumb-item active text-primary">Arsip</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    <section class="mt-5">
        <div class="container-fluid blog">
            <div class="container mt-auto">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <div class=" bg-light shadow p-3 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="row mb-2">
                            <form action="{{ route('surat.index') }}" method="GET" class="w-100">
                                <div class="d-flex flex-wrap justify-content-between gap-2">

                                    {{-- Input Pencarian --}}
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-pill border-0" id="subject"
                                                placeholder="Cari Surat" name="cari" value="{{ request('cari') }}">
                                            <label for="subject">Cari Surat</label>
                                        </div>
                                    </div>

                                    {{-- Dropdown Jenis Surat --}}
                                    <div class="col-lg-4">
                                        <div class="form-floating my-auto">
                                            <select class="form-select rounded-pill border-0" name="tag"
                                                onchange="this.form.submit()">
                                                <option value="">-- Pilih Nama Surat --</option>
                                                @foreach ($jenisSurat as $jenis)
                                                    <option value="{{ $jenis->id }}"
                                                        {{ request('tag') == $jenis->id ? 'selected' : '' }}>
                                                        {{ $jenis->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="jenisSurat">Pilih Jenis Surat</label>
                                        </div>
                                    </div>

                                    <!-- {{-- Tombol Cari opsional --}}
                                                    <div class="col-lg-2">
                                                        <button class="btn btn-sm btn-primary w-100 py-3 rounded-pill" type="submit">
                                                            Cari
                                                        </button>
                                                    </div> -->

                                    {{-- Tombol Reset --}}
                                    <div class="col-lg-2">
                                        <a href="{{ route('surat.index') }}"
                                            class="btn btn-sm btn-primary w-100 py-3 rounded-pill">
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>


                        {{-- <div class="row mb-4">
                            <form action="{{ route('surat.index') }}" method="GET" class="text-start">
                    @foreach ($indexBidang as $bidang)
                    <button name="tag" class="btn btn-sm btn-outline-primary"
                        value="{{ $bidang->id }}">{{ $bidang->nama }}</button>
                    @endforeach
                    </form>
                </div> --}}
                    </div>
                </div>
                <div class=" wow fadeInUp" data-wow-delay="0.2s">
                    <div class="row" style="justify-content: center">
                        {{-- Menampilkan data surat --}}
                        @foreach ($indexSurat as $surat)
                            <div class="col-md-6">
                                <div class="blog-item shadow p-4 mb-5">
                                    <a href="#" class="h4 d-inline-block mb-3">{{ $surat->nama_surat }}</a>
                                    <p class="mb-4">{{ $surat->isi_surat }}
                                    </p>
                                    <div class="d-flex mb-0 justify-content-between">
                                        <div class="blog-title">
                                            <div class="blog-title">
                                                <div class="row mb-4">
                                                    <form action="{{ route('surat.index') }}" method="GET"
                                                        class="text-start">
                                                        <button name="tag" class="btn-md btn btn-primary"
                                                            value="{{ $surat->jenis->id }}">{{ $surat->jenis->nama }}</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="">
                                            <a class="btn-md btn btn-primary"
                                                href="{{ route('surat.detail', ['id' => $surat->id]) }}"> <i
                                                    class="fa-solid fa-circle-info"></i> Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
