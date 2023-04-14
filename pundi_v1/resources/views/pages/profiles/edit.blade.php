@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding" style="background-color: #F7F7F7">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @include('masterPages.alerts')
                    <form class="needs-validation" novalidate action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="card no-b">
                            <div class="card-body">
                                <a class="text-black font-weight-bold fs-14 judul-hover" href="{{ route('profil') }}"><i class="fa fa-arrow-left mr-1"></i>Kembali</a>
                                <div class="text-center">
                                    <img class="rounded-circle img-circular" id="preview" src="{{ config('app.ftp_src').'images/ava/'.$user->photo }}" height="100" width="100" alt="{{ $user->name }}">
                                    <div class="container col-md-4 mt-2">
                                        <input type="file" name="photo" id="file" class="input-file" value="{{ $user->photo }} " onchange="tampilkanPreview(this,'preview')"/>
                                        <label for="file" class="form-control input single-input-primary bdr-5 js-labelFile col-md-12">
                                            <div class="text-center mt-n1">
                                                <i class="icon fa fa-image"></i>
                                                <span class="js-fileName fs-12">Pilih File</span>
                                            </div>
                                        </label>
                                    </div>
                                    <i class="fs-12 mt-n2">Maksimal File 1MB</i>
                                </div>
                                <hr>
                                <div class="mb-5">
                                    <p class="fs-24 f-b f-blk m-b-20"><span style="border-left: 6px solid #FEBD01;margin-right: 10px"></span>Edit Profil</p>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 f-b col-form-label">EMAIL</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" id="email" class="form-control input single-input-primary" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-4 f-b col-form-label">NAMA<span class="text-danger ml-1">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" id="name" class="form-control input single-input-primary" value="{{ $user->name }}" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nama tidak boleh kosong!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-4 f-b col-form-label">NAMA DEPAN<span class="text-danger ml-1">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="first_name" id="first_name" class="form-control input single-input-primary" value="{{ $user->first_name }}" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nama Depan tidak boleh kosong!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-4 f-b col-form-label">NAMA BELAKANG<span class="text-danger ml-1">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="last_name" id="last_name" class="form-control input single-input-primary" value="{{ $user->last_name }}" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nama Belakang tidak boleh kosong!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-4 f-b col-form-label">FACEBOOK</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="facebook" id="facebook" class="form-control input single-input-primary" placeholder="username facebook" value="{{ $user->facebook }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="twitter" class="col-sm-4 f-b col-form-label">TWITTER</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="twitter" id="twitter" class="form-control input single-input-primary" placeholder="username twitter" value="{{ $user->twitter }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instagram" class="col-sm-4 f-b col-form-label">INSTAGRAM</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="instagram" id="instagram" class="form-control input single-input-primary" placeholder="username instagram" value="{{ $user->instagram }}">
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-24 f-b f-blk" style="margin-bottom: 5px"><span style="border-left: 6px solid #FEBD01;margin-right: 10px"></span>Informasi Rahasia</p>
                                <span class="fs-14" style="color: #999999">Kami tidak akan membagikan data di bawah tanpa persetujuan Anda</span>
                                <div class="mt-4">
                                    <div class="form-group row">
                                        <label for="twitter" class="col-sm-4 f-b col-form-label">TANGGAL LAHIR</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="birth_date" id="birth_date" class="form-control input single-input-primary" value="{{ $user->birth_date }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_telp" class="col-sm-4 f-b col-form-label">NOMOR HANDPHONE</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="no_telp" id="no_telp" value="{{ $user->no_telp }}" class="form-control input single-input-primary">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_telp" class="col-sm-4 f-b col-form-label">JENIS KELAMIN</label>
                                        <div class="col-sm-8 row mt-2">
                                            <div class="col-md-4 row ml-1">
                                                <input type="radio" {{ $user->gender == 'Laki Laki' ? 'checked' : '' }} name="gender" id="laki" value="Laki Laki" class="primary-radio">
                                                <label for="laki" style="margin-top: -3px; margin-left: 10px">Laki-laki</label>
                                            </div>
                                            <div class="col-md-4 row ml-1">
                                                <input type="radio" {{ $user->gender == 'Perempuan' ? 'checked' : '' }} name="gender" id="perempuan" value="Perempuan" class="primary-radio">
                                                <label for="perempuan" style="margin-top: -3px; margin-left: 10px">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button class="genric-btn primary btn-block bdr-5" type="submit"><i class="fa fa-save mr-2"></i>Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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