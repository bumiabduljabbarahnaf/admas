@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<div class="container m-t-15">
    <div class="m-0">
        <i class="fa fa-home"></i>
        <a class="m-l-8 m-r-8 f-red fs-14 non-hover f-orange hover-blk" href="{{ route('/') }}">
            <span>Home</span>
        </a>
        <i class="fa fa-angle-right"></i>
        <a class="m-l-8 m-r-8 f-red fs-14 non-hover f-orange hover-blk" href="{{ route('category',str_slug($subCategory->category->n_category)) }}">
            <span>{{ $subCategory->category->n_category }}</span>
        </a>
        <i class="fa fa-angle-right"></i>
        <a class="m-l-8 m-r-8 f-red fs-14 non-hover f-orange hover-blk" href="{{ route('sub-category',str_slug($subCategory->n_sub_category)) }}">
            <span>{{ $subCategory->n_sub_category }}</span>
        </a>
    </div>
    <div class="m-t-10">
        <div class="-mb-13">
            <i class="fas fa-angle-up fa-lg arrow"></i>
        </div>
        <span class="fs-18 m-l-15 kategori-title"> 
            KATEGORI : {{ $subCategory->n_sub_category }}
        </span>
    </div>
</div>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @forelse ($articles as $i)
                    <div class="row m-b-30">
                        <div class="col-sm-6">
                            @if (Storage::disk('ftp')->exists('images/artikel/' . $i->image) == true)
                            <img class="bdr-5 m-b-10 img-circular" title="{{ $i->image }}" src="{{ config('app.ftp_src').$path.$i->image }}" width="350" height="350" alt="{{ $i->title }}">
                            @else
                            <img class="bdr-5 m-b-10 mx-auto d-block" title="Gambar tidak ditemukan" src="{{ asset('images/404.png') }}" width="350" height="250" alt="photo">
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <span class="bdr-5 fs-11 f-b sub-kategori-card">
                                <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                            </span>
                            <p class="fs-19 f-b f-blk m-t-10">
                                <a href="{{ route('article', str_slug($i->title_slug)) }}" class="text-black judul-hover">{{ $i->title }}</a>
                            </p>
                            <div class="-mt-10 text-grey">
                                <i class="fa fa-user mr-1"></i>
                                <a href="{{ route('other-user', str_slug($i->user->name_slug)) }}" class="judul-hover text-grey fs-13">
                                    {{ $i->user->name }}
                                </a>
                                <i class="fas fa-clock mr-1 ml-3"></i>
                                <span class="fs-13">{{ substr($i->created_at,0,10) }}</span>
                            </div>
                            <div class="text-justify mt-2">
                                {{  substr(strip_tags(str_replace(["&nbsp;", "&mdash;", "&rdquo;", "&ldquo;", "&rsquo;", "&hellip;"],' ',$i->content)),0,400) }} […]
                            </div>
                            <a href="{{ route('article', str_slug($i->title_slug)) }}" class="f-blk fs-13 f-b m-t-5 judul-hover">
                                <span>BACA SELENGKAPNYA</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="mt-2">
                        <img class="mx-auto d-block" src="{{ asset('images/article-not-found.png') }}" width="180" alt="">
                        <p class="text-center font-weight-bold fs-14">Belum ada artikel</p>
                    </div>
                    @endforelse
                    <div>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
            @include('masterPages.sideBar')
        </div>
    </div>
</section>
@include('masterPages.footer')
@endsection
