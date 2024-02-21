<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        <style>table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

    </style>
</head>

<body>
    <main class="content">
        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="card-title mb-0">Hasil Ranking</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Alternatif</th>
                                <th>Nama</th>
                                <th>Nilai Akhir</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->member->member_code }}</td>
                                    <td>{{ $result->members_name }}</td>
                                    <td class="fw-bold">{{ $result->result }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
