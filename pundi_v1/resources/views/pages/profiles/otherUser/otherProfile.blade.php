@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding" style="background-color: #F7F7F7">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="rounded-circle img-circular" src="{{ config('app.ftp_src').'images/ava/'.$user->photo }}" height="100" width="100"  alt="{{ $user->name }}">
                                <p class="fs-22 font-weight-bold text-black mt-3">{{ $user->name }}
                                    @if ($countArticle < 5)
                                    <i style="color: #945d41" title="Artikel < 5" class="fa fa-medal ml-1"></i>
                                    @elseif($countArticle >= 5 && $countArticle <= 10)
                                    <i style="color: #C0C0C0" title="Artikel > 5" class="fa fa-medal ml-1"></i>
                                    @elseif($countArticle >= 10)
                                    <i style="color: #ffc60b" title="Artikel 10+" class="fa fa-medal ml-1"></i>
                                    @endif
                                </p>
                                <p class="text-black -mt-10">“ {{ $user->bio }} ”</p>
                                <div class="mb-2 mt-n2">
                                    @if ($user->facebook != null)
                                    <a class="f-blk judul-hover" href="https://web.facebook.com/{{ $user->facebook }}" target="blank">
                                        <i class="fa fa-facebook-square fa-lg mr-2"></i>
                                    </a>
                                    @endif
                                    @if ($user->twitter != null)
                                    <a class="f-blk judul-hover" href="https://twitter.com/{{ $user->twitter }}" target="blank">
                                        <i class="fa fa-twitter-square fa-lg mr-2"></i>
                                    </a>
                                    @endif
                                    @if ($user->instagram != null)
                                    <a class="f-blk judul-hover" href="https://www.instagram.com/{{ $user->instagram }}" target="blank"> 
                                        <i class="fab fa-instagram-square fa-lg"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-black judul-hover" id="home-tab" data-toggle="tab" href="#home" role="tab">Artikel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black judul-hover" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Komentar</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!-- Article -->
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        @if ($articleUser->count() != 0)
                                        <table class="table mt-2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30" style="border-bottom: none">#</th>
                                                    <th style="border-bottom: none">Judul</th>
                                                    <th width="60">Dilihat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($articleUser as $index => $i)
                                                <tr>
                                                    <td scope="row">{{ $index+1 }}</td>
                                                    <td><a href="{{ route('article', str_slug($i->title_slug)) }}" class="text-black text-decoration-none judul-hover">{{ $i->title }}</a></td>
                                                    <td>{{ $i->views }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>
                                            {{ $articleUser->links() }}
                                        </div>
                                        @else
                                        <div class="mt-2">
                                            <img class="mx-auto d-block" src="{{ asset('images/article-not-found.png') }}" width="180" alt="">
                                            <p class="text-center font-weight-bold fs-14">Belum ada artikel</p>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- Comment -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel">
                                        @if ($comment->count() != 0)
                                            @foreach ($comment as $i)
                                            <div class="row">
                                                <div class="col-md-12 p-3">
                                                    <span class="font-weight-bold">{{ $user->name }}</span>
                                                    <span class="ml-1">mengomentari</span>
                                                    <span class="font-weight-bold fs-14 ml-1">{{ $i->article->title }}</span>
                                                    <br>
                                                    <span class="">{{ $i->content }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="mt-2">
                                            <img class="mx-auto d-block" src="{{ asset('images/comment-not-found.png') }}" width="180" alt="">
                                            <p class="text-center font-weight-bold fs-14">Belum ada komentar</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
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