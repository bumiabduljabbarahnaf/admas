<div class="">
    <p class="fs-20 f-b f-blk" style="margin-top: -20px">{{ $comment->count() }} Komentar</p>
    <input type="hidden" id="count" value="{{ $comment->count() }}">
    <div class="container p-0">
        @foreach ($comment as $index => $k)
        <div class="media post_item mt-4">
            <img src="{{ config('app.ftp_src').'images/ava/'.$k->user->photo }}" width="35" height="35" class="img-circular rounded-circle" alt="">
            <div class="media-body ml-3">
                <span class="font-weight-bolder"><a href="{{ route('other-user', str_slug($k->user->name)) }}" class="judul-hover text-black">{{ $k->user->name }}</a></span>
                <br>
                <span class="text-black">{{ $k->content }}</span>
                <br>
                <i class="fas fa-clock fa-xs text-grey fs-13"></i>
                <span class="text-grey fs-13">{{ $k->created_at }} · </span> 
                <span class="fs-13 text-grey font-weight-bolder"><a class="judul-hover" id="click{{ $index }}">Balas</a></span>
                @if (Auth::user() != null)
                    @if ($k->user_id == Auth::user()->id)
                    <span class="fs-13 text-grey font-weight-bolder"><a href="#" class="text-grey judul-hover"> · Hapus</a></span>
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
                    <img src="{{ config('app.ftp_src').'images/ava/'.$c->user->photo }}" width="35" height="35" class="img-circular rounded-circle" alt="">
                    <div class="media-body ml-3">
                        <span class="font-weight-bolder"><a href="{{ route('other-user', str_slug($c->user->name)) }}" class="judul-hover text-black">{{ $c->user->name }}</a></span>
                        <br>
                        <span class="text-black">{{ $c->content }}</span>
                        <br>
                        <i class="fas fa-clock fa-xs text-grey fs-13"></i>
                        <span class="text-grey fs-13">{{ $c->created_at }}</span> 
                        @if (Auth::user() != null)
                            @if ($c->user_id == Auth::user()->id)
                            <span class="fs-13 text-grey font-weight-bolder"><a href="#" class="text-grey judul-hover"> · Hapus</a></span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var x = $('#count').val();
    $(document).ready(function(){
        for (let i = 0; i < x; i++) {
            $("#click"+i).click(function(){
                $("#data"+i).toggle();
            }); 
        }
    });
</script>