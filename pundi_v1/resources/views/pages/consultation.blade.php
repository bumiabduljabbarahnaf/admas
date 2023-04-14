@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar" style="text-align: justify">
                    @include('masterPages.alerts')
                    <p class="f-blk fs-30 f-b">Konsultasi</p>
                    <div class="mt-3">
                        <img class="d-block m-auto img-fluid" src="{{ config('app.ftp_src').'images/logo/tentang_kami.png' }}" width="300" alt="photo">
                    </div>
                    <div class="mt-3">
                        <div class="m-b-5">
                            <span>Whatsapp : 0821-2226-9993</span>
                        </div>
                        <div class="m-b-5">
                            <span>Whatsapp Group : </span>
                            <a class="text-black" href="">-</a><br>
                        </div>  
                        <div>
                            <span>Email : admin@pundi.or.id</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-black judul-hover" id="home-tab" data-toggle="tab" href="#konsultasi" role="tab">Konsultasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black judul-hover" id="profile-tab" data-toggle="tab" href="#pertanyaan" role="tab">Pertanyaan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--Consultation -->
                            <div class="tab-pane fade show active" id="konsultasi" role="tabpanel">
                                <p class="fs-20 font-weight-bold text-black mt-2" style="margin-bottom: 5px">Konsultasi</p>
                                <span>Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</span>
                                <form class="needs-validation" novalidate action="{{ route('consultation.send') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-sm">
                                                <input type="text" class="form-control single-input-primary border" name="name" value="{{ old('name') }}" required placeholder="Masukan Nama *">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Nama tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                            <div class="col-sm">
                                                <input type="text" class="form-control single-input-primary border" name="email" value="{{ old('email') }}" required placeholder="Masukan Email *">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Email tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 p-0 mt-3">
                                            <div class="form-group">
                                                <textarea class="form-control single-input-primary border" name="consultation" rows="4" placeholder="konsultasi *" required>{{ old('consultation') }}</textarea>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Konsultasi tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="genric-btn primary btn-block bdr-5" type="submit"><i class="fa fa-paper-plane mr-2"></i>Kirim Konsultasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Question -->
                            <div class="tab-pane fade show" id="pertanyaan" role="tabpanel">
                                <p class="fs-20 font-weight-bold text-black mt-2" style="margin-bottom: 5px">Pertanyaan</p>
                                <span>Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</span>
                                <form class="needs-validation" novalidate action="{{ route('question.send') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-sm">
                                                <input type="text" class="form-control single-input-primary border" name="nameQuestion" value="{{ old('nameQuestion') }}" required placeholder="Masukan Nama *">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Nama tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                            <div class="col-sm">
                                                <input type="text" class="form-control single-input-primary border" name="emailQuestion" value="{{ old('emailQuestion') }}" required placeholder="Masukan Email *">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Email tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 p-0 mt-3">
                                            <div class="form-group">
                                                <textarea class="form-control single-input-primary border" name="questionQuestion" rows="4" placeholder="Pertanyaan *" required>{{ old('questionQuestion') }}</textarea>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Pertanyaan tidak boleh kosong!</strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="genric-btn primary btn-block bdr-5" type="submit"><i class="fa fa-paper-plane mr-2"></i>Kirim Pertanyaan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('masterPages.sideBar')
        </div>
    </div>
</section>
@include('masterPages.footer')
@endsection

