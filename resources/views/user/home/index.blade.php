@extends('user.master.layout')
@section('content')
    <section class="mt-5">
        <div class="container-fluid feature pb-5">
            <div class="container pb-5">

                {{-- Menampilkan data bidang --}}
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-5 text-primary mb-4">Bidang Surat</h2>
                </div>
                <div class="row g-4" style="justify-content: center">
                    @foreach ($indexBidang as $bidang)
                        <div class="col-md-6 col-lg-6 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="feature-item p-4 shadow">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#modalBidang{{ $bidang->id }}">
                                    <i class="fas fa-info-circle fa-6x"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalBidang{{ $bidang->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $bidang->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalLabel{{ $bidang->id }}">Deskripsi
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{ $bidang->deskripsi }}</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="feature-icon p-3 mb-2">
                                    <!-- Optional icon content -->
                                </div>
                                <h5 class="text-primary">{{ $bidang->nama }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="mt-3">
        <div class="container-fluid blog pb-5">
            <div class="container pb-5">
                {{-- Menampilkan data surat --}}
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-5 text-primary mb-4">Arsip Surat</h2>
                </div>
                <div class=" wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row" style="justify-content: center">

                        <div class="row">

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
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Done",
                text: ('{{ $message }}'),
            });
        </script>
    @endif
@endsection
