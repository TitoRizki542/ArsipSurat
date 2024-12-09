@extends('admin.master.layout')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selemat Datang,
                                    <strong>{{ auth('admin')->user()->nama }}
                                        !!</strong>
                                </h5>
                                <p class="mb-3">
                                    Sistem pengarsipan surat <span class="fw-bold">DPM4KB Kota Magelang</span> berbasis
                                    website.
                                </p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    Info Profile
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Profil Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <p>Nama</p>
                                                        <p>Email</p>
                                                        <p>No Hp</p>
                                                        <p>Alamat</p>
                                                        <p>Jenis Kelamin</p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <p>: {{ Auth::guard('admin')->user()->nama }}</p>
                                                        <p>: {{ Auth::guard('admin')->user()->email }}</p>
                                                        <p>: {{ Auth::guard('admin')->user()->nomor_hp }}</p>
                                                        <p>: {{ Auth::guard('admin')->user()->alamat }}</p>
                                                        <p>: {{ Auth::guard('admin')->user()->jenis_kelamin }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ URL::asset('assets') }}/img/illustrations/man-with-laptop-light.png"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ URL::asset('assets') }}/img/pdf1.png" alt="chart success"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total</span>
                                <h3 class="card-title mb-1">{{ $suratMasuk }}</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Surat
                                    Masuk</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ URL::asset('assets') }}/img/pdf2.png" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total</span>
                                <h3 class="card-title mb-1">{{ $suratKeluar }}</h3>
                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>Surat
                                    Keluar</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-lg-4 ">

        </div> --}}
            <div class="col-lg-12">
                <div class="card">
                    <h6 class="card-header pb-2">
                        Arsip Surat Terbaru
                    </h6>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Kategori Surat</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($dataSurat as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $data->nama_surat }}</strong></td>
                                        <td>{{ $data->jenis->nama }}</td>
                                        <td>{{ $data->kategori->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
