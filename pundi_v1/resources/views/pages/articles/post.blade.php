@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.css" rel="stylesheet">
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @include('masterPages.alerts')
                    <div>
                        <form id="form" class="needs-validation" novalidate action="{{ route($route.'store') }}" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <p class="fs-30 f-b f-blk mb-n3">Kirim Tulisan</p>
                            <hr>
                            <p class="mt-n4 fs-13">Baca ketentuan tulisan <a class="f-orange hover-blk" href="{{ config('app.url'). '/ketentuan-tulisan' }}">disini</a></p>
                            <div class="m-t-20">
                                <label class="f-b col-form-label">JUDUL ARTIKEL<span class="text-danger ml-1">*</span></label>
                                <input type="text" class="form-control input single-input-primary border bdr-5 col-md-12" name="title" id="title" value="{{ old('title') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Judul Artikel tidak boleh kosong!</strong>
                                </span>
                            </div>
                            <div class="mt-3">
                                <label class="f-b col-form-label">KATEGORI <span class="text-danger ml-1">*</span></label><br>
                                <div class="row">
                                    <select name="category_id" id="category_id" value="{{ old('category_id') }}" class="kategori input single-input-primary border select" required>
                                        <option value="99">Pilih Kategori</option>
                                        @foreach ($category as $i)
                                            <option value="{{ $i->id }}" @if ($category_id == $i->id) selected="selected"@endif>
                                                {{ $i->n_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select name="sub_category_id" id="sub_category_id" class="kategori1 input single-input-primary border select" required>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="f-b col-form-label">GAMBAR <span class="text-danger ml-1">*</span></label><br>
                                <input type="file" name="image" id="file" class="input-file" onchange="tampilkanPreview(this,'preview')">
                                <label for="file" class="input single-input-primary border bdr-5 col-md-12 js-labelFile">
                                    <div class="text-center">
                                        <i class="icon fa fa-image"></i>
                                        <span class="js-fileName fs-12">Pilih File</span>
                                    </div>
                                </label>
                                <br>
                                <img width="300" class="rounded img-fluid d-block mx-auto mt-2 mb-3" id="preview"/>
                            </div>
                            <div class="mt-n3">
                                <label class="f-b col-form-label">SUMBER GAMBAR <span class="text-danger ml-1">*</span></label>
                                <input type="text" class="form-control input single-input-primary border bdr-5 col-md-12" name="source_image" id="source_image" value="{{ old('source_image') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Sumber Gambar tidak boleh kosong!</strong>
                                </span>
                            </div>
                            <div class="mt-3">
                                <label class="f-b col-form-label">ARTIKEL <span class="text-danger ml-1">*</span></label>   
                                <textarea name="content" id="editor">{{ old('content') }}</textarea>
                            </div>
                            <div class="mt-3">
                                <label class="f-b col-form-label">TAGAR <span class="text-danger ml-1">*</span></label>
                                <input type="text" class="form-control input single-input-primary border bdr-5 col-md-12" value="{{ old('tag') }}" name="tag" id="tag" required>
                                <i class="fs-12 text-danger">Pisahkan dengan koma ( , )</i>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Tag tidak boleh kosong!</strong>
                                </span>
                            </div>
                            <hr>
                            <button id="button" class="genric-btn primary bdr-5 btn-block mt-n4 " type="submit"  value="Log in">KirimTulisan<i class="fa fa-share-square ml-2"></i></button>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('#editor').summernote({
        placeholder: 'Tulis disini ...',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear', 'italic']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['insert', ['picture']],
            ['paragraph', ['ul', 'ol', 'paragraph', 'height']],
            ['view', ['fullscreen']]
        ]
    });

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }else{
            $('#button').attr('disabled', 'disabled');
        }
        $(this).addClass('was-validated');
    });

    // Sub Category
    $(document).ready(function(){
        $('#category_id').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "{{ route($route.'subCategoryByCategory', ':id') }}".replace(':id', id),
                method : "GET",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    if (data) {
                        $.each(data, function(index, value){
                            html += '<option value='+value.id+'>'+value.n_sub_category+'</option>'; 
                        });
                        $('#sub_category_id').html(html);
                    } else {
                        $('#sub_category_id').html(html);
                    }   
                }
            });
            return false;
        }); 
    });
</script>
@endsection
