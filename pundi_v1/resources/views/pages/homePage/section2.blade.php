<div class="weekly-news-area pt-20">
    <div class="container">
       <div class="weekly-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle m-b-20">
                        <div class="-mb-13">
                            <i class="fas fa-angle-up fa-lg arrow"></i>
                        </div>
                        <span class="fs-18 m-l-15 title-card"> 
                            {{ $titleCard->card1 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($card2 as $i)
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img style="height: 300px; object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                            </div>
                            <div class="weekly-caption">
                                <span class="bdr-5" style="background-color: #FEBD01 !important; color: white !important">
                                    <a class="hover-blk" href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}">{{ $i->sub_category->n_sub_category }}</a>
                                </span>
                                <h4 class="-mt-10">
                                    <a href="{{ route('article', str_slug($i->title_slug)) }}">
                                        {{ $i->title }}
                                    </a>
                                </h4>
                                <div>
                                    <i class="fa fa-user text-grey"></i>
                                    <a href="{{ route('other-user', str_slug($i->user->name)) }}" class="fs-13 m-l-5 text-grey judul-hover">
                                        {{ $i->user->name }}
                                    </a>
                                    <i class="fas fa-clock m-l-10 text-grey"></i>
                                    <a class="fs-13 m-l-5 text-grey">
                                        {{ substr($i->created_at, 0, 10) }}
                                    </a>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>    