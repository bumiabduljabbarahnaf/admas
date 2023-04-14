<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside>
            <div class="news-poster d-lg-block">
                <div class="">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators m-b-1">
                            @foreach( $poster as $i )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach( $poster as $i )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img class="bdr-5" style="object-fit: cover; object-position: center;-o-object-fit: cover"  src="{{ config('app.ftp_src').'/images/poster/'.$i->poster }}" width="350" height="460" alt="poster">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="">
            <p class="text-center m-t-15 fs-14 text-grey"><i>- Advertisement -</i></p>
            <aside class="single_sidebar_widget popular_post_widget bg-transparent">
                @foreach ($sideBar as $i)
                <div class="media post_item m-t-20">
                    <img style="object-fit: cover; object-position: center" class="bdr-5" src="{{ config('app.ftp_src').'images/artikel/'.$i->image }}" width="120" height="90" alt="{{ $i->title }}">
                    <div class="media-body">
                        <span class="fs-13 text-uppercase">
                           <a class="f-orange hover-blk" href="{{ route('sub-category', str_slug($i->sub_category->n_sub_category)) }}">{{ $i->sub_category->n_sub_category }}</a> 
                        </span>
                        <a href="{{ route('article', str_slug($i->title_slug)) }}">
                            <h3>{{ $i->title }}</h3>
                        </a>
                        <i class="fas fa-clock fa-sm text-grey"></i>
                        <span class="fs-13 text-grey ml-1">{{ substr($i->created_at, 0, 10) }}</span>
                    </div>
                </div>
                @endforeach
            </aside>
        </div>
    </div>
</div>
