<nav>                  
    <ul id="navigation">    
        <li>
            <a href="{{ route('category',str_slug($category1->n_category)) }}">{{ $category1->n_category }}</a>
            <ul class="submenu">
                @foreach ($subCategory1 as $i)
                <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>   
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('category',str_slug($category2->n_category)) }}">{{ $category2->n_category }}</a>
            <ul class="submenu">
                @foreach ($subCategory2 as $i)
                <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('category',str_slug($category3->n_category)) }}">{{ $category3->n_category }}</a>
            <ul class="submenu">
                @foreach ($subCategory3 as $i)
                <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('category',str_slug($category4->n_category)) }}">{{ $category4->n_category }}</a>
            <ul class="submenu">
                @foreach ($subCategory4 as $i)
                <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('consultation') }}">{{ $category5->n_category }}</a>
        </li>
        @if (Auth::user() != null)
        <li>
            <a href="">Akun</a>
            <ul class="submenu">
                <li><a href="{{ route('profil') }}"><i class="fa fa-user mr-2"></i>Edit Profil</a></li>
                <li><a href="{{ route('article.post.index') }}"><i class="fa fa-file-alt mr-2"></i>Kirim Tulisan</a></li>
                <li><a href="{{ config('app.url'). '/ketentuan-tulisan' }}"><i class="fa fa-file-alt mr-2"></i>Ketentuan Tulisan</a></li>
                <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt mr-2"></i>Log Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
        @else 
        <li>
            <a href="">Akun</a>
            <ul class="submenu">
                <li><a href="{{ route('article.post.index') }}"><i class="fa fa-file-alt mr-2"></i>Kirim Tulisan</a></li>
                <li><a href="{{ config('app.url'). '/ketentuan-tulisan' }}"><i class="fa fa-file-alt mr-2"></i>Ketentuan Tulisan</a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-2"></i>Login</a></li>
            </ul>
        </li>
        @endif
        <li>
            <form class="form-row d-flex justify-content-center md-form form-sm mt-1" action="{{ route('search') }}" method="GET">
                <div class="input-group input-group-lg" style="margin-left: 6%">
                    <input type="text" class="single-input-primary2" name="n_article" style="width: 82%"  placeholder="Search Keyword">
                    <div class="input-group-prepend" style="background: #FEBD01;">
                        <button type="submit" style="border: none; background: #FEBD01; width: 50px">
                            <i class="fa fa-search" style="color: white"></i> 
                        </button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
</nav>
