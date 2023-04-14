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
        <a class="m-l-8 m-r-8 f-red fs-14 non-hover f-orange hover-blk" href="{{ route('sub-category',str_slug($article->category->n_category)) }}">
            <span>{{ $article->category->n_category }}</span>
        </a>
        <i class="fa fa-angle-right mr-2"></i>
        <span>{{substr($article->title, 0, 20)}}...</span>
    </div>
</div>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post" style="position: -webkit-sticky">
                    <div class="blog_detail">
                        <p class="f-b fs-25 text-black">{{ $article->title }}</p>
                        <div class="mt-3 mb-4">
                            <span class="bdr-5 fs-12 f-b sub-kategori-card">
                                <a class="hover-blk" href="{{ route('sub-category',str_slug($article->sub_category->n_sub_category)) }}">{{ $article->sub_category->n_sub_category }}</a>
                            </span>
                            <img src="{{ config('app.ftp_src').'images/ava/'.$article->user->photo }}" class="rounded-circle img-circular m-l-30" height="45" width="45" alt="{{ $article->user->name }}">
                            <a class="text-black judul-hover" href="{{ route('other-user', str_slug($article->user->name)) }}">
                                <span class="fs-14 f-b m-l-10">{{ $article->user->name }}</span>
                            </a>
                            <i class="fas fa-clock m-l-15 text-grey"></i>
                            <span class="fs-14">{{ $article->release_date != null ? $article->release_date : $article->created_at }}</span>
                            <i class="fa fa-comments m-l-15 text-grey"></i>
                            <span class="fs-14">{{ $countComment }} Komentar</span>
                            <i class="fa fa-eye m-l-15 f-orange"></i>
                            <span class="fs-14">{{ $article->views }}</span>
                        </div>
                        <div class="mt-3">
                            @if (Storage::disk('ftp')->exists('images/artikel/' . $article->image) == true)
                            <img class="img-fluid bdr-5" width="800" src="{{ config('app.ftp_src').$path.$article->image }}" alt="{{ $article->title }}">
                            @else
                            <img class="img-fluid bdr-5" width="800" src="{{ asset('images/404.png') }}" alt="photo">
                            @endif
                            <p class="text-grey fs-12">Sumber: {{ $article->source_image == null ? '-' : $article->source_image }}</p>
                        </div>
                        <div class="mt-3">
                            {!! $article->content !!}
                        </div> 
                    </div>
                    <div class="mt-3">
                        <div>
                            <span class="f-b f-blk">
                                <label>Editor : </label>
                                <label class="f-orange">
                                    <a class="f-orange text-uppercase">{{ $editor != null ? $editor->nama : '-' }}</a>
                                </label>    
                            </span>
                        </div>
                        <!-- Tags -->
                        <div class="mt-2">
                            <div class="media post_item">
                                <div class="media-body">
                                    @if ($article->tag != null)
                                        @foreach (explode(',', $article->tag) as $tags)
                                        <a class="genric-btn warning-border circle medium mt-1" href="{{ route('tag.index', str_replace(' ', '',$tags)) }}">{{ $tags }}</a>
                                        @endforeach
                                    @else 
                                    <span class="ml-2">-</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Share -->
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-6 pl-0">
                                    <a class="mr-1" href="http://www.facebook.com/sharer.php?u=http://pundi.or.id/pundi/artikel/{{$article->title_slug}}" target="_blank">
                                        <img src="{{ asset('images/facebook.png') }}" width="40" alt="Facebook" />
                                    </a>
                                    <a class="mr-1" href="https://twitter.com/share?url=http://pundi.or.id/pundi/artikel/{{$article->title_slug}}&text={{$article->title}}" target="_blank">
                                        <img src="{{ asset('images/twitter.png') }}" width="40" alt="Twitter" />
                                    </a>
                                    <a class="mr-1" href="whatsapp://send?text={{$article->title}}%0Ahttp://pundi.or.id/pundi/artikel/{{$article->title_slug}}" target="blank" data-action="share/whatsapp/share">
                                        <img src="{{ asset('images/whatsapp.png') }}" width="40" alt="Whatsapp" />
                                    </a>
                                    {{-- <a href="#">
                                        <img src="{{ asset('images/copy.png') }}" width="40" alt="Copy" />
                                    </a> --}}
                                </div>
                                <div class="col-6 text-right">
                                    <img src="{{ asset('images/comment.png') }}" width="50" alt="icon comment">
                                    <span class="fs-17">{{ $countComment }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-n1">
                    <!-- Author -->
                    <div class="blog-author mb-1 mt-1">
                        <div class="media align-items-center">
                            <img class="rounded-circle img-circular" src="{{ config('app.ftp_src').'images/ava/'.$article->user->photo }}" height="70" width="70" alt="{{ $article->user->name }}">
                            <div class="media-body m-l-40 m-t-20">
                                <a href="{{ route('other-user', str_slug($article->user->name)) }}">
                                    <span class="fs-15 f-b non-hover f-blk">{{ $article->user->name }}</span>
                                </a>
                                <p>{{ $article->user->bio }}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-n1">
                    <!-- Related Article -->
                    <div class="">
                        <p class="fs-20 f-b f-blk" style="margin-top: -20px">Artikel Terkait</p>
                        <div class="container p-0">
                            @foreach ($relateds as $i)
                            <div class="media post_item mt-2">
                                @if (Storage::disk('ftp')->exists('images/artikel/' . $i->image) == true)
                                <img class="bdr-5 img-circular" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" width="100" height="70" alt="{{ $i->title }}">
                                @else
                                <img class="bdr-5 img-circular" src="{{ asset('images/404.png') }}" width="100" height="70" alt="artikel">
                                @endif
                                <div class="media-body ml-4">
                                    <a class="text-black font-weight-bold judul-hover" href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                    <br>
                                    <i class="fas fa-user fa-xs text-grey mr-1"></i>
                                    <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                        <span class="judul-hover" style="color: grey">{{ $i->user->name }}</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <!-- Comment -->
                    <div class="">
                        <p class="fs-20 f-b f-blk" style="margin-top: -20px">{{ $countComment }} Komentar</p>
                        <input type="hidden" id="count" value="{{ $comment->count() }}">
                        <div class="container p-0">
                            @foreach ($comment as $index => $k)
                            <div class="media post_item mt-4">
                                <img src="{{ config('app.ftp_src').'images/ava/'.$k->user->photo }}" width="35" height="35" class="img-circular rounded-circle" alt="{{ $k->user->name }}">
                                <div class="media-body ml-3">
                                    <span class="font-weight-bolder"><a href="{{ route('other-user', str_slug($k->user->name)) }}" class="judul-hover text-black">{{ $k->user->name }}</a></span>
                                    <br>
                                    @if ($k->status == 1)
                                    <span class="text-grey"><i>Komentar dihapus</i></span>
                                    @else
                                    <span class="text-black">{{ $k->content }}</span>
                                    @endif
                                    <br>
                                    @if ($k->status == 0)
                                        <i class="fas fa-clock fa-xs text-grey fs-13"></i>
                                        <span class="text-grey fs-13">{{ $k->created_at }} · </span> 
                                        <span class="fs-13 text-grey font-weight-bolder"><a class="judul-hover" id="click{{ $index }}">Balas</a></span>
                                        @if (Auth::user() != null)
                                            @if ($k->user_id == Auth::user()->id)
                                            <span class="fs-13 text-grey font-weight-bolder"><a href="{{ route('comment.deleteComment', $k->id) }}" class="text-grey judul-hover"> · Hapus</a></span>
                                            @endif
                                        @endif
                                    @endif
                                    <!-- Reply Comment -->
                                    <div style="display: none" id="data{{ $index }}" class="mt-n2">
                                        <form class="needs-validation mt-3" novalidate action="{{ route('comment.saveSubComment') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                                            <input type="hidden" name="comment_id" value="{{ $k->id }}">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control input single-input-primary border" name="sub_comment" rows="2" placeholder="Tulis Komentar..." required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-n2">
                                                @if (Auth::user() == null)
                                                <button type="button" class="genric-btn primary bdr-5 medium pl-2 pr-2" onclick="mustLogin()">kirim <i class="fa fa-paper-plane ml-1"></i></button>
                                                @else
                                                <button type="submit" class="genric-btn primary bdr-5 medium pl-2 pr-2">kirim <i class="fa fa-paper-plane ml-1"></i></button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Sub Comment -->
                                    @php
                                        $subComment = App\Models\subComment::where('comment_id', $k->id)->get();
                                    @endphp
                                    @foreach ($subComment as $c)
                                    <div class="media post_item mt-4">
                                        <img src="{{ config('app.ftp_src').'images/ava/'.$c->user->photo }}" width="35" height="35" class="img-circular rounded-circle" alt="{{ $c->user->name }}">
                                        <div class="media-body ml-3">
                                            <span class="font-weight-bolder"><a href="{{ route('other-user', str_slug($c->user->name)) }}" class="judul-hover text-black">{{ $c->user->name }}</a></span>
                                            <br>
                                            @if ($c->status == 1)
                                            <span class="text-grey"><i>Komentar dihapus</i></span>
                                            @else
                                            <span class="text-black">{{ $c->content }}</span>
                                            @endif
                                            <br>
                                            @if ($c->status == 0)
                                                <i class="fas fa-clock fa-xs text-grey fs-13"></i>
                                                <span class="text-grey fs-13">{{ $c->created_at }}</span> 
                                                @if (Auth::user() != null)
                                                    @if ($c->user_id == Auth::user()->id)
                                                    <span class="fs-13 text-grey font-weight-bolder"><a href="{{ route('comment.deleteSubComment', $c->id) }}" class="text-grey judul-hover"> · Hapus</a></span>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <!-- Send Comment -->
                    <div class="">
                        <p class="fs-20 f-b f-blk" style="margin-top: -20px">Tinggalkan Balasan</p>
                        {{-- <i>Ruas yang wajib ditandai *</i> --}}
                        <form class="needs-validation mt-3" novalidate action="{{ route('comment.saveComment') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control input single-input-primary border" name="comment" rows="3" placeholder="Tulis Komentar..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-n2 mb-4">
                                @if (Auth::user() == null)
                                <button type="button" class="genric-btn primary bdr-5 medium pl-2 pr-2" onclick="mustLogin()">kirim <i class="fa fa-paper-plane ml-1"></i></button>
                                @else
                                <button type="submit" class="genric-btn primary bdr-5 medium pl-2 pr-2">kirim <i class="fa fa-paper-plane ml-1"></i></button>
                                @endif
                            </div>
                        </form>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tombol_hide").click(function () {
            $("#more").show();
            $("#less").hide();
            $("#less1").hide();
        })

        $("#tombol_show").click(function () {
            $("#more").hide();
            $("#less").show();
            $("#less1").show();
        })
    });

    function mustLogin() {
        Swal.fire(
            '',
            'Silahkan login untuk memberi komentar.',
            'warning'
        )
    }

    var x = $('#count').val();
    $(document).ready(function(){
        for (let i = 0; i < x; i++) {
            $("#click"+i).click(function(){
                $("#data"+i).toggle();
            }); 
        }
    });
</script>
@endsection
