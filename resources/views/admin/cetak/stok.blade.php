<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan Stok Obat</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
        }

        .table1 {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        .table1 tbody tr td {
            padding: 10px;
            border: 1px solid #dddddd;
        }

        .table1 tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table1 tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .table1 tbody tr td:nth-child(2) {
            width: 30px;
            text-align: center;
        }

        .table1 tbody tr td:nth-child(1),
        .table1 tbody tr td:nth-child(3) {
            width: 200px;
        }

        .font-semibold {
            font-weight: 600;
        }

        .table2 {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        .table2 th,
        .table2 td {
            padding: 12px;
            border: 1px solid #dddddd;
        }

        .table2 thead {
            background-color: #f2f2f2;
        }

        .table2 thead th {
            font-weight: bold;
            text-align: center;
        }

        .table2 tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table2 tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .table2 tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table2 tbody th {
            text-align: center;
        }

        .table2 tbody td {
            text-align: left;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div x-data="mainState" :class="{ dark: isDarkMode }" x-on:resize.window="handleWindowResize" x-cloak>
        <div class="container mx-auto">
            <p style="text-align: center; font-weight:bolder">DATA OBAT KELUAR PUSKESMAS KOYA</p>
        </div>
        <table class="table1">
            <tbody class="font-semibold">
                <tr>
                    <td>KODE PUSKESMAS</td>
                    <td>:</td>
                    <td>12345678</td>
                </tr>
                <tr>
                    <td>PUSKESMAS</td>
                    <td>:</td>
                    <td>KOYA</td>
                </tr>
                <tr>
                    <td>KECAMATAN</td>
                    <td>:</td>
                    <td>TONDANO</td>
                </tr>
                <tr>
                    <td>KAB/KOTA</td>
                    <td>:</td>
                    <td>MINAHASA</td>
                </tr>
                <tr>
                    <td>PROVINSI</td>
                    <td>:</td>
                    <td>SULAWESI UTARA</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <table>
                <div class="">
                    <table class="table2">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Obat</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Jumlah Obat</th>
                                <th>Satuan</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @foreach ($data as $item)
                            <tr>
                                <th>{{$no++}}</th>
                                <td>{{ \Carbon\Carbon::parse($item->tanggalObat)->format('d F Y') }}</td>
                                <td>{{$item->kodeObat}}</td>
                                <td>{{$item->namaObat}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>{{$item->satuan}}</td>
                                <td>{{$item->kondisi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </table>
        </div>
    </div>
</body>

</html>