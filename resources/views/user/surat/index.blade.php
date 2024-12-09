@extends('user.surat.layout')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Arsip Surat</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Surat</a></li>
                <li class="breadcrumb-item active text-primary">Arsip</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    <section class="mt-5">
        <div class="container-fluid blog">
            <div class="container mt-auto">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <div class=" bg-light shadow p-4 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        {{-- Form Pencarian Surat --}}
                        <div class="row mb-4">
                            <form action="{{ route('surat.index') }}" method="GET">
                                <div class="d-flex justify-content-between gap-2">
                                    <div class="col-lg-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-pill border-0" id="subject"
                                                placeholder="Cari Surat" name="cari">
                                            <label for="subject">Cari
                                                Surat</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-2">
                                        <button class="btn btn-sm btn-primary w-100 py-3 rounded-pill"
                                            type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row mb-4">
                            <form action="{{ route('surat.index') }}" method="GET" class="text-start">
                                @foreach ($indexKategori as $kategori)
                                    <button name="tag" class="btn btn-sm btn-outline-primary"
                                        value="{{ $kategori->id }}">{{ $kategori->nama }}</button>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>

                <div class=" wow fadeInUp" data-wow-delay="0.2s">
                    <div class="row">
                        @foreach ($indexSurat as $surat)
                            <div class="col-lg-4">
                                <div class="blog-item p-4 mb-5">
                                    <div class="blog-img mb-4">
                                        <img src="{{ URL::asset('landing') }}/img/service-1.jpg"
                                            class="img-fluid w-100 rounded" alt="">
                                        <div class="blog-title">
                                            <a href="" class="btn btn-sm">{{ $surat->jenis->nama }}</a>
                                            <a href="" class="btn btn-sm">{{ $surat->kategori->nama }}</a>
                                        </div>
                                    </div>
                                    <a href="#" class="h4 d-inline-block mb-3">{{ $surat->nama_surat }}</a>
                                    <p class="mb-4">{{ $surat->isi_surat }}
                                    </p>
                                    <div class="ms-3 text-end ">
                                        <a class="btn-lg btn btn-primary rounded-pill py-2 px-4"
                                            href="{{ route('surat.detail', ['id' => $surat->id]) }}">Detail</a>
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
