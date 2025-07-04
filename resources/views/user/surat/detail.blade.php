@extends('user.surat.layout')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Detail Surat Bidang {{ $bidang }}
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Surat</a></li>
                <li class="breadcrumb-item active text-primary">Detail</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-5 mb-4">{{ $detailSurat->nama_surat }}</h2>
                    <p class="mb-0">{{ $detailSurat->isi_surat }}
                    </p>
                </div>
                <div class="row" style="justify-content: center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="rounded-bottom p-4 shadow">
                            <h4 class="text-primary mb-4 text-center">Detail Informasi Surat</h4>
                            <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                                <h6 class="mb-0">Nomor Surat</h6>
                                <p class="mb-0">{{ $detailSurat->nomor_surat }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                                <h6 class="mb-0">Tanggal Surat</h6>
                                <p class="mb-0">{{ $detailSurat->tanggal_surat }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                                <h6 class="mb-0">Jenis Surat</h6>
                                <p class="mb-0">{{ $detailSurat->jenis->nama }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                                <h6 class="mb-0">Kategori Surat</h6>
                                <p class="mb-0">{{ $detailSurat->bidang->nama }}</p>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="0.4s">
                                <div class="row">
                                    <div class="col-lg-9 mx-auto text-center">

                                        <a class="btn btn-primary rounded-pill py-2 px-5 mt-3"
                                            href="{{ asset('storage/' . $detailSurat->file_surat) }}" target="_blank"><i
                                                class="fa-solid
                                        fa-file-arrow-down"></i>
                                            Unduh Surat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
