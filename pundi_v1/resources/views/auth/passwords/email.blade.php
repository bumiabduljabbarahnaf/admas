@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show text-center bdr-5 col-md-12 container" role="alert">
                        <p class="text-center m-auto">
                            Cek email Anda untuk mengganti password.
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form class="needs-validation" action="{{ route('password.email') }}" method="POST" novalidate>
                        @csrf
                        <p class="text-center fs-30 f-b f-blk">Lupa Password</p>
                        <p class="text-center f-blk mt-n1">Masukan E-mail untuk mengganti password</p>
                        <div class="mt-10 form-group row">
                            <label class="col-sm-2 f-b col-form-label" for="email">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control input single-input-primary @error('email') is-invalid @enderror" placeholder="example@email.com" required/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>E-mail belum terdaftar</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button class="genric-btn primary bdr-5"><i class="fa fa-paper-plane mr-2"></i>Kirim</button>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
            @include('masterPages.sideBar')
        </div>
    </div>
</section>
@include('masterPages.footer')
@endsection
