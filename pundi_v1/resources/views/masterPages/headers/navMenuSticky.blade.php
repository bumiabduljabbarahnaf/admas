<nav>
    <ul>
        <li>
            <a href="{{ route('category',str_slug($category1->n_category)) }}" style="font-size: 13px !important" class="text-uppercase">{{ $category1->n_category }} <span class="fa fa-angle-down "></span></a>
            <ul class="submenu">
                @foreach ($subCategory1 as $i)
                    <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('category',str_slug($category2->n_category)) }}" style="font-size: 13px !important" class="text-uppercase">{{ $category2->n_category }} <span class="fa fa-angle-down "></a>
            <ul class="submenu">
                @foreach ($subCategory2 as $i)
                    <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul> 
        </li>
        <li>
            <a href="{{ route('category',str_slug($category3->n_category)) }}" style="font-size: 13px !important" class="text-uppercase">{{ $category3->n_category }} <span class="fa fa-angle-down "></a>
            <ul class="submenu">
                @foreach ($subCategory3 as $i)
                    <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('category',str_slug($category4->n_category)) }}" style="font-size: 13px !important" class="text-uppercase">{{ $category4->n_category }} <span class="fa fa-angle-down "></a>
            <ul class="submenu">
                @foreach ($subCategory4 as $i)
                    <li><a href="{{ route('sub-category',str_slug($i->n_sub_category)) }}">{{ $i->n_sub_category }}</a></li>  
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ route('consultation') }}" style="font-size: 13px !important" class="text-uppercase">{{ $category5->n_category }}</a>
        </li>
        {{-- <li>
            <a href="#" style="font-size: 13px !important" class="text-uppercase">Dokumen</a>
        </li> --}}
        @if (Auth::user() != null)
        <li>
            <a href="" style="font-size: 13px !important">AKUN <span class="fa fa-angle-down "></a>
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
            <a href="" style="font-size: 13px !important"">AKUN <span class="fa fa-angle-down "></a>
            <ul class="submenu">
                <li><a href="{{ route('article.post.index') }}"><i class="fa fa-file-alt mr-2"></i>Kirim Tulisan</a></li>
                <li><a href="{{ config('app.url'). '/ketentuan-tulisan' }}"><i class="fa fa-file-alt mr-2"></i>Ketentuan Tulisan</a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-2"></i>Login</a></li>
            </ul>
        </li>
        @endif
        <li>
            <a href="#" style="font-size: 13px !important" class="text-uppercase"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i></a>
        </li>
    </ul>
</nav>

