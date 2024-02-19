@extends('layouts.admin.app')

@section('content')
    <main class="content">
        {{-- Breadrcumb --}}
        <nav class="c-navigation-breadcrumbs">
            <ol class="c-navigation-breadcrumbs__directory">

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link" href="javscript:;">
                        <span property="name">Perhitungan SMART</span>
                    </a>
                </li>

                <span class="me-2"> // </span>

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active"
                        href="{{ route('perhitungan.value-calculation') }}">
                        <span property="name">Buat Pengumuman</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h1 class="card-title mb-0">Broadcast</h1>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ route('sendMessage') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Document</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <select name="template" id="template" class="form-select" onchange="updateTextarea()">
                                        <option selected disabled>Pilih Template</option>
                                        <option value="woro">Woro-Woro Latihan!</option>
                                        <option value="kustom">Kustom Pesan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea name="message" id="message" cols="30" rows="15" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="footer" class="form-label">Oleh</label>
                                    <input type="text" name="footer" class="form-control"
                                        value="--Regrads, {{ auth()->user()->username . '--' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary my-4">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </main>

    <script>
        function updateTextarea() {
            let templateSelect = document.getElementById("template");
            let messageTextarea = document.getElementById("message");
            let selectedTemplate = templateSelect.value;

            switch (selectedTemplate) {
                case "woro":
                    messageTextarea.value =
                        `Assalamualaikum Wr.Wb\nٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُه\n\nWoroo woroo... 📣\nAnnyeong haseyo, chinggu yaaa 👋\n\nPengumuman untuk awak teater bahtera besok akan diadakan latihan mingguan pada :\n\nHari : Sabtu, 17 Februari 2024\nWaktu : 09.00 WIB\nTempat : Sekolah\n\n👗 Dress : baju latihan, celana training, dan kerudung hitam ✨\n\nDitunggu kehadirannya yaa kakak alumni 🤩\n\nSekian pemberitahuan hari ini\n\n🎭 Belajar untuk hidup, hidup untuk belajar, maka pelajarilah hidup\n\nSalam teater, bahtera!!⛵\n\nWassalamu'alaikum Wr.Wb\nوالسلام عليكم ورحمة الله وبركاته`;
                    break;
                case "kustom":
                    // Biarkan textarea kosong untuk template kustom
                    messageTextarea.value = "";
                    break;
                default:
                    // Biarkan textarea kosong jika tidak ada template yang dipilih
                    messageTextarea.value = "";
                    break;
            }
        }
    </script>
@endsection
