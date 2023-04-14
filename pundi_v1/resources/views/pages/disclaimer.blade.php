@extends('layouts.app')
@section('content')
@include('masterPages.headers.header')
<section class="blog_area section-padding" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar" style="text-align: justify">
                    <div>
                        <p class="f-blk fs-30 f-b">Disclaimer</p>
                        <ol class="ordered-list text-black fs-16">
                            <li>Seluruh layanan yang di berikan di situs pundi.or.id ditunjukkan untuk kebutuhan pribadi Anda bukan untuk dikomersialkan.</li>
                            <li>Seluruh konten yang ada di dalam situs termasuk teks, video, foto, audio, ilustrasi, infografik dan lainnya dilindungi oleh undang-undang hak cipta yang dimiliki pundi.or.id, dan atau pihak ketiga penyedia isi di situs ini.</li>
                            <li>Hak cipta setiap karya yang telah dimuat di pundi.or.id berada pada <b>penulis/kontributor.</b> Artinya pundi.or.id hanya memiliki hak untuk mempublikasikan saja.</li>
                            <li>Redaksi berhak menolak/tidak menerbitkan tulisan yang telah dikirimkan. Jika dalam <b>tiga hari tulisan tidak terbit</b> di pundi.or.id, maka secara <b>otomatis ditolak.</b></li>
                            <li><b>Redaksi berhak menyunting tulisan</b> dari penulis, seperti mengubah judul dan isi naskah tanpa mengubah substansinya, atau menghilangkan segala isi unggahan pengguna yang melanggar aturan hukum sebagaimana diatur oleh Pedoman Pemberitaan Media Siber. Penyebaran karya pundi.or.id di tempat lain diperkenankan sejauh menyebut nama penulis.</li>
                            <li>Penyebaran karya pundi.or.id di tempat lain diperkenankan sejauh menyebut nama penulis dan sumber pundi.or.id, serta minimal <b>dua hari</b> setelah ditayangkan di PUNDI.</li>
                            <li>Pihak yang merasa dirugikan oleh artikel-artikel yang dipublish di pundi.or.id bisa melayangkan protes melalui email <b>admin@pundi.or.id</b></li>
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

