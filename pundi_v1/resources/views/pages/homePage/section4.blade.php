<div class="weekly2-news-area m-b-30">
    <div class="container">
        <div class="weekly2-wrapper -mt-10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <div class="-mb-13">
                            <i class="fas fa-angle-up fa-lg arrow"></i>
                        </div>
                        <span class="fs-18 m-l-15 title-card"> 
                            {{ $titleCard->card3 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 -mt-10">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        @foreach ($card3 as $i)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="200" alt="{{ $i->title }}">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                        <a class="hover-blk" href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}">{{ $i->sub_category->n_sub_category }}</a>
                                    </span><br>
                                    <div class="-mt-10">
                                        <i class="fas fa-clock fa-xs text-grey"></i>
                                        <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                    </div>
                                    <h4 class="-mt-15"><a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a></h4>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                </div>
            </div>
            <hr width="100%" class="mt-10" style="color: #ddd">
        </div>
    </div>
</div>