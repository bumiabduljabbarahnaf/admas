<section class="whats-news-area m-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 -mt-10">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle">
                            <div class="-mb-13">
                                <i class="fas fa-angle-up fa-lg arrow"></i>
                            </div>
                            <span class="fs-18 m-l-15 title-card"> 
                                {{ $titleCard->card2 }}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 m-t-5">
                        <div class="properties__button">                                       
                            <nav>                                                                     
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active fs-14i text-uppercase" id="nav-home-tab" data-toggle="tab" href="#all">Semua</a>
                                    <a class="nav-item nav-link fs-14i text-uppercase" id="nav-profile-tab" data-toggle="tab" href="#card1">{{ $category1->n_category }}</a>
                                    <a class="nav-item nav-link fs-14i text-uppercase" id="nav-contact-tab" data-toggle="tab" href="#card2">{{ $category2->n_category }}</a>
                                    <a class="nav-item nav-link fs-14i text-uppercase" id="nav-last-tab" data-toggle="tab" href="#card3">{{ $category3->n_category }}</a>
                                    <a class="nav-item nav-link fs-14i text-uppercase" id="nav-Sports" data-toggle="tab" href="#card4">{{ $category4->n_category }}</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row -mt-15">
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="all">           
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($all as $i)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news m-b-30">
                                                <div class="what-img">
                                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                                        <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                                                    </span>
                                                    <i class="fas fa-clock fa-xs m-l-10 text-grey"></i>
                                                    <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                                    <br>
                                                    <div style="margin-top: -10px">
                                                        <i class="fas fa-user fa-xs text-grey"></i>
                                                        <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                                            <span class="judul-hover" style="color: grey;margin-left: -10px">{{ $i->user->name }}</span>
                                                        </a>
                                                    </div>
                                                    <h4 style="margin-top: -15px">
                                                        <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="card1">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($n_category1 as $i)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                                        <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                                                    </span>
                                                    <i class="fas fa-clock fa-xs m-l-10 text-grey"></i>
                                                    <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                                    <br>
                                                    <div style="margin-top: -10px">
                                                        <i class="fas fa-user fa-xs text-grey"></i>
                                                        <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                                            <span class="judul-hover" style="color: grey;margin-left: -10px">{{ $i->user->name }}</span>
                                                        </a>
                                                    </div>
                                                    <h4 style="margin-top: -15px">
                                                        <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="card2">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($n_category2 as $i)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                                        <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                                                    </span>
                                                    <i class="fas fa-clock fa-xs m-l-10 text-grey"></i>
                                                    <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                                    <br>
                                                    <div style="margin-top: -10px">
                                                        <i class="fas fa-user fa-xs text-grey"></i>
                                                        <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                                            <span class="judul-hover" style="color: grey;margin-left: -10px">{{ $i->user->name }}</span>
                                                        </a>
                                                    </div>
                                                    <h4 style="margin-top: -15px">
                                                        <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="card3">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($n_category3 as $i)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                                        <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                                                    </span>
                                                    <i class="fas fa-clock fa-xs m-l-10 text-grey"></i>
                                                    <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                                    <br>
                                                    <div style="margin-top: -10px">
                                                        <i class="fas fa-user fa-xs text-grey"></i>
                                                        <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                                            <span class="judul-hover" style="color: grey;margin-left: -10px">{{ $i->user->name }}</span>
                                                        </a>
                                                    </div>
                                                    <h4 style="margin-top: -15px">
                                                        <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="card4">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($n_category4 as $i)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img style="object-fit: cover; object-position: center" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" height="300" alt="{{ $i->title }}">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="bdr-5" style="background-color: #FEBD01; color: white">
                                                        <a href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}" class="hover-blk">{{ $i->sub_category->n_sub_category }}</a>
                                                    </span>
                                                    <i class="fas fa-clock fa-xs m-l-10 text-grey"></i>
                                                    <span style="color: grey; margin-left: -10px">{{ substr($i->created_at, 0, 10) }}</span>
                                                    <br>
                                                    <div style="margin-top: -10px">
                                                        <i class="fas fa-user fa-xs text-grey"></i>
                                                        <a class="judul-hover" href="{{ route('other-user', str_slug($i->user->name_slug)) }}">
                                                            <span class="judul-hover" style="color: grey;margin-left: -10px">{{ $i->user->name }}</span>
                                                        </a>
                                                    </div>
                                                    <h4 style="margin-top: -15px">
                                                        <a href="{{ route('article', str_slug($i->title_slug)) }}">{{ $i->title }}</a>
                                                    </h4>
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
            </div>
            @include('pages.homePage.sideBar')
        </div>
        <hr width="100%" class="-mt-10" style="color: #ddd">
    </div>
</section>