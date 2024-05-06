@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')

    <div class="row">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar MBKM</h4>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="card-body">
                        <div class="buttons">
                            <a href="#" class="btn btn-primary">Daftar MBKM</a>
                        </div>
                    </div>
                </div>

                {{-- Pelatihan --}}
                <div class="row">
                    @foreach ($pelatihans as $pelatihan)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="assets/img/news/img08.jpg">
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">{{ $pelatihan->nama_pelatihan }}</a></h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p>{{ $pelatihan->deskripsi }} </p>
                                    <div class="article-cta">
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    @foreach ($portofolios as $portofolio)
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="assets/img/news/img13.jpg">
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category"><a href="#">News</a>
                                        <div class="bullet"></div> <a href="#">5 Days</a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">{{ $portofolio->judul }}</a></h2>
                                    </div>
                                    <p>{{ $portofolio->deskripsi }}</p>
                                    <div class="article-user">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">{{ $portofolio->klien }}</a>
                                            </div>
                                            <div class="text-job">{{ $portofolio->kategori }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        @endsection
