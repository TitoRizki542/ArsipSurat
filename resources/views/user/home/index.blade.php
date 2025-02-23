@extends('user.master.layout')
@section('content')
    <section class="mt-5">
        <div class="container-fluid feature pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-5 text-primary mb-4">Bidang Surat</h2>
                    {{-- <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                        cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                        sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p> --}}
                </div>
                <div class="row g-4">
                    @foreach ($indexKategori as $kategori)
                        <div class="col-md-6 col-lg-6 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="feature-item p-4 shadow">
                                <div class="feature-icon p-4 mb-4">
                                    <i class="fas fa-info-circle fa-4x text-primary"></i>
                                </div>
                                <h5 class="text-primary">{{ $kategori->nama }}</h5>
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
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-5 text-primary mb-4">Arsip Surat</h2>
                    {{-- <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                        cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                        sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p> --}}
                </div>
                <div class=" wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        @foreach ($indexSurat as $surat)
                            <div class="col-lg-4">
                                <div class="blog-item p-4 mb-5">
                                    <div class="blog-img mb-4">
                                        <img src="{{ URL::asset('landing') }}/img/service-1.jpg"
                                            class="img-fluid w-100 rounded" alt="">
                                        <div class="blog-title">
                                            <a href="" class="btn">{{ $surat->jenis->nama }}</a>
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
