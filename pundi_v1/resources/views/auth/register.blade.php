@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding">
    <div class="container">
        @include('masterPages.alerts')
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <form class="needs-validation" action="{{ route('register') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-5">
                            <p class="fs-30 f-b f-blk m-b-40">Register Kontributor</p>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 f-b col-form-label">EMAIL<span class="text-danger ml-1">*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" id="email" class="form-control input single-input-primary {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>E-mail sudah pernah terdaftar!</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 f-b col-form-label">PASSWORD<span class="text-danger ml-1">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" id="password" class="form-control input single-input-primary @error('password') is-invalid @enderror" autocomplete="off" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Konfirmasi password tidak cocok!</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 f-b col-form-label">KONFIRMASI PASSWORD<span class="text-danger ml-1">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input single-input-primary" autocomplete="off" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Konfirmasi Password tidak boleh kosong!</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="fs-30 f-b f-blk">Personal Data Kontributor</p>
                        <p class="fs-12 -mt-10">Data berikut digunakan untuk menampilkan Profil Kontributor</p>
                        <hr class="-mt-10">
                        {{-- <div class="form-group row">
                            <label for="username" class="col-sm-4 f-b col-form-label">USERNAME<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="username" id="username" class="form-control input single-input-primary" value="{{ old('username') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Username tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 f-b col-form-label">NAMA<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="name" class="form-control input single-input-primary" value="{{ old('name') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nama tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 f-b col-form-label">NAMA DEPAN<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="first_name" id="first_name" class="form-control input single-input-primary" value="{{ old('first_name') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nama Depan tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 f-b col-form-label">NAMA BELAKANG<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" id="last_name" class="form-control input single-input-primary" value="{{ old('last_name') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nama Belakang tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 f-b col-form-label" for="photo">FOTO PROFIL <span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" name="photo" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')"/>
                                <label for="file" class="form-control input single-input-primary bdr-5 js-labelFile col-md-12">
                                    <div class="text-center mt-n1">
                                        <i class="icon fa fa-image"></i>
                                        <span class="js-fileName fs-12">Pilih File</span>
                                    </div>
                                </label>
                                <img class="rounded-circle img-circular mb-2 mx-auto d-block" id="preview" width="100" height="100"/>
                                <hr class="m-0">
                                <i class="fs-12 ">Bisa berupa foto, logo, atau symbol icon. Maksimal 1 Mb.</i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-sm-4 f-b col-form-label">BIOGRAFI<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <textarea type="text" name="bio" id="bio" class="form-control input single-input-primary" required>{{ old('bio') }}</textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Biografi tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="no_telp" class="col-sm-4 f-b col-form-label">NOMOR HANDPHONE<span class="text-danger ml-1">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="no_telp" id="no_telp" class="form-control input single-input-primary" value="{{ old('no_telp') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nomor Handphone tidak boleh kosong!</strong>
                                </span>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="facebook" class="col-sm-4 f-b col-form-label">FACEBOOK</label>
                            <div class="col-sm-8">
                                <input type="text" name="facebook" id="facebook" class="form-control input single-input-primary" placeholder="username facebook" value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter" class="col-sm-4 f-b col-form-label">TWITTER</label>
                            <div class="col-sm-8">
                                <input type="text" name="twitter" id="twitter" class="form-control input single-input-primary" placeholder="username twitter" value="{{ old('twitter') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram" class="col-sm-4 f-b col-form-label">INSTAGRAM</label>
                            <div class="col-sm-8">
                                <input type="text" name="instagram" id="instagram" class="form-control input single-input-primary" placeholder="username instagram" value="{{ old('instagram') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button class="genric-btn primary bdr-5" type="submit">Register <i class="fa fa-arrow-right ml-1"></i></button>
                            </div>
                        </div>
                        <hr>
                        <p class="m-t-20 f-blk -mt-10">Sudah punya akun? 
                            <a href="{{ route('login') }}">
                                <u class="f-orange hover-blk">Login!</u>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
            @include('masterPages.sideBar')
        </div>
    </div>
</section>
@include('masterPages.footer')
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script type="text/javascript">
    // file name preview
    (function () {
        'use strict';
        $('.input-file').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                    .removeClass('has-file').html(labelVal);
            });
        });
    })();

    // image preview
    function tampilkanPreview(gambar, idpreview) {
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                Swal.fire(
                    'Tipe file tidak boleh',
                    'Harus format gambar',
                    'error'
                )
            }
        }
    }
</script>
@endsection
