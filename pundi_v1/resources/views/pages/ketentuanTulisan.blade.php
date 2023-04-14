@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar" style="text-align: justify">
                    <div>
                        <p class="f-blk fs-30 f-b">Ketentuan Penulisan</p>
                        <P class="text-black">
                            Bagi kamu yang berkeinginan mengirim naskah tulisan, perhatikan ketentuan kepenulisan berikut ini:
                        </P>
                        <ol class="ordered-list text-black fs-16">
                            <li>Tulisan Terdiri dari 700-1500 kata.</li>
                            <li>Kirim tulisanmu dengan pilih menu kirim tulisan di bagian header.</li>
                            <li>Penulis/Kontributor yang belum pernah mendaftar, silahkan daftar dengan klik link berikut <a class="f-orange" href="{{ route('register') }}">“Daftar sekarang!”</a>.</li>
                            <li>Penulis yang karyanya mencapai 500 views dalam waktu 3 x 24 jam, bisa menghubungi pundi.or.id untuk mendapatkan honorarium melalui CP berikut: 0821-2226-9993.</li>
                        </ol>
                    </div>
                    <div class="m-t-30">
                        <p class="f-blk fs-25 f-b">Kriteria kepenulisan</p>
                        <ol class="ordered-list text-black fs-16">
                            <li>Tulisan dengan tema yang menarik dan tulisannya rapi, akan cepat di terbitkan.</li>
                            <li>Penulis wajib menggunakan identitas asli.</li>
                            <li>Tulisan harus memperhatikan tata-bahasa standar, dari soal tanda-baca, huruf besar-huruf-kecil, dan penggunaan transliterasi yang benar. Kata-kata asing umumnya dibuat miring (italyc).</li>
                            <li>Panjang setiap paragraf adalah antara 200 sampai 300 karakter. Paragraf yang lebih dari 300 karakter terlihat kurang nyaman untuk dibaca pada layar HP/ponsel.</li>
                            <li>Tidak menggunakan huruf kapital disemua judul tulisan, huruf capital hanya di gunakan pada awal kata.</li>
                            <li>Tidak menulis judul dua kali. Judul cukup ditulis di kolom yang tersedia.</li>
                            <li>Setiap tulisan harus disertakan foto/gambar yang standar, yakni sebesar 450 piksel (atau maksimal 730X489) dengan menuliskan sumber gambar/foto tersebut diambil.</li>
                            <li>Pilih kategori tulisan sesuai dengan tema yang Anda tulis.</li>
                            <li>Penulis dilarang mengirimkan artikel yang pernah diterbitkan di media lain, baik media daring atau cetak tanpa sepengetahuan tim redaksi pundi.or.id. Penulis juga dilarang mengirim satu tulisan pada saat bersamaan ke media lain.</li>
                        </ol>
                    </div>
                </div>
            </div>
            @include('masterPages.sideBar')
        </div>
    </div>
</section>
@include('masterPages.footer')
@endsection
