<div class="recent-articles -mt-10">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <div class="-mb-13">
                            <i class="fas fa-angle-up fa-lg arrow"></i>
                        </div>
                        <span class="fs-18 m-l-15 title-card"> 
                            {{ $titleCard->card4 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 -mt-10">
                    <div class="recent-active dot-style d-flex dot-style">
                        @foreach ($card4 as $i)
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                            </div>
                            <div class="what-cap">
                                <span class="bdr-5 m-r-10" style="background-color: #FEBD01; color: white">
                                    <a class="hover-blk" href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}">{{ $i->sub_category->n_sub_category }}</a>
                                </span>
                                <i class="fas fa-clock fa-xs text-grey"></i>
                                <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                <h4>
                                    <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
