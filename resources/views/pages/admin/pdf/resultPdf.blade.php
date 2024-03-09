<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>Invoice - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <style type="text/css">
        body {
            background: #ffffff;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .text-center {
            text-align: center;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        /* .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        } */

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered,
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
            /* Warna dan ketebalan garis sesuaikan kebutuhan */
        }

        .table-bordered th,
        .table-bordered td {
            padding: 8px;
            /* Sesuaikan padding sesuai kebutuhan */
        }

        /* .receipt-main thead {
            background-color: #414143;
        } */

        .receipt-main thead th {
            background-color: #333333;
            color: #ffffff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-left p {
            font-weight: 100;
            margin: 10px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }

        .header-content {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .header-content img,
        .header-content h1 {
            margin-left: 10px;
            margin-bottom: 0px
                /* Untuk memberikan sedikit jarak antara gambar dan teks */
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="row">
            <div class="receipt-main">
                <div class="header-content">
                    <table class="align-middle">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ public_path('assets/img/logos/logo_sman8.png') }}"
                                        alt="Logo SMAN 8 Kab. Tangerang" style="width: 7rem; heigth: auto;">
                                </td>
                                <td class="text-center">
                                    <h1 class="text-center">TEATER BAHTERA</h1>
                                    <h3 class="text-center">SMAN 8 Kabupaten Tangerang</h3>
                                    <br>
                                    <p class="text-center">Jl. Siliwangi No.30, Cisoka, Kec. Cisoka, Kabupaten
                                        Tangerang, Banten 15730
                                    </p>
                                </td>
                                <td>
                                    <img src="{{ public_path('assets/img/logos/logo-teater-circle.png') }}"
                                        alt="Logo SMAN 8 Kab. Tangerang" style="width: 8rem; heigth: auto;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>Rekap Nilai</h5>
                                <p><b>Periode :</b> {{ $periode }}</p>
                                <p><b>Tanggal : </b> {{ $date }}</p>
                                <p><b>Dibuat Oleh : </b> System</p>
                                <p><b> Dikirim Oleh : </b> {{ auth()->user()->username }}</p>
                            </div>
                        </div>
                        {{-- <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h3>INVOICE # 102</h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Kelas</th>
                                <th>Nilai Akhir</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results->sortByDesc('result') as $result)
                                <tr>
                                    <td> {{ $result->members_name }} </td>
                                    <td class="text-center"> {{ $result->member->member_code }} </td>
                                    <td class="text-center"> {{ $result->member->grade . ' ' . $result->member->major }}
                                    </td>
                                    <td class="text-center"> {{ $result->result }} </td>
                                    <td class="text-center"> {{ $loop->iteration }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>Coach</h1>
                                <br>
                                <br>
                                <br>
                                <p>Iip Maulana Syaiful Bahri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript"></script>
</body>

</html>
