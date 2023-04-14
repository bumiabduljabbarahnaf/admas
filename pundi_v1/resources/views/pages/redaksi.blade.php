@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar" style="text-align: justify">
                    <div>
                        <p class="f-blk fs-30 f-b">Redaksi</p>
                        <P class="text-black">Susunan Redaksi</P>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Penasehat</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Prof. Dr. Ahmad Syafii Maarif</label> <br>
                                <label class="form-label">: Fajar Riza Ul Haq </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Pemimpin Umum</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Iman Sumarlan</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Sekretaris Redaksi</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Ari Susanto</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Redaktur Pelaksana</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Haryono kapitang</label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Kordinator Media</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Bagus Handoko</label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Kordinator lidbang</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Muhammad Isa Ansori</label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Humas</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Nuzulul Purwandana</label><br>
                                <label class="form-label">: Rahmad Saleh </label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Editor</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: khansa Ativa</label><br>
                                <label class="form-label">: Khoniatur Rohmah</label><br>
                                <label class="form-label">: Arista Aulia Firdaus</label><br>
                                <label class="form-label">: Laili Tri Agustina</label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Reporter</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Ilham Hardianto</label><br>
                                <label class="form-label">: Muhammad Fadir</label><br>
                                <label class="form-label">: Muhammad Haidar Albana</label><br>
                                <label class="form-label">: Dedes</label><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Alamat</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">: Jl. Kebun Raya, RT. 18/RW 6, Gg. Melati, Rejosari KG. I,
                                    Yogyakarta, 55171</label><br>
                                <label class="form-label">&nbsp; Email : admin@pundi.or.id</label><br>
                                <label class="form-label">&nbsp; Hp/Wa : 0821-2226-9993 </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="form-label"><strong>Donasi</strong></label>
                            </div>
                            <div class="col">
                                <label class="form-label">Bank Mandiri 137-00-0011118-3 A.n. YAYASAN PEGIAT PENDIDIKAN INDONESIA</label>
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
