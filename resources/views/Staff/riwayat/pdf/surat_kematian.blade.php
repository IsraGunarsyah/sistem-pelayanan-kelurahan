<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 2px solid black;
        }
        .header img {
            width: 60px;
            height: auto;
            margin-top: -40px;
        }
        .header-text {
            text-align: center;
            flex: 1;
            line-height: 1.1;
            margin-top: -40px;
        }
        .header-text h2, .header-text h1, .header-text p {
            margin: 0;
            line-height: 1.2;
        }
        .header-text h2 {
            font-size: 16px;
            font-weight: normal;
        }
        .header-text h1 {
            font-size: 20px;
            font-weight: bold;
        }
        .header-text p {
            font-size: 10px;
        }
        .title {
            text-align: center;
            margin-top: 10px;
            text-transform: uppercase;
        }
        .title h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
        }
        .title p {
            margin: 3px 0;
            font-size: 12px;
        }
        .content {
            margin: 10px 20px;
            font-size: 18px;
        }
        .content .indent {
            text-indent: 30px;
        }
        .content table {
            width: 100%;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .content td {
            vertical-align: top;
            padding: 1px 0;
        }
        .footer {
            margin-left:500px;
            margin-top: 20px;
        }
        @page {
            size: A4;
            margin: 10mm;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('images/logo-bw.png') }}" alt="Logo Kota Bontang">
        <div class="header-text">
            <h2>PEMERINTAH KOTA BONTANG</h2>
            <h2>KECAMATAN BONTANG SELATAN</h2>
            <h1>KELURAHAN TANJUNG LAUT INDAH</h1>
            <p>Alamat: Jl. Pelabuhan No. 53 Kelurahan Tanjung Laut Indah Telp. (0548) 28902 – 28903 Kode Pos: 75323</p>
            <h2><u>BONTANG</u></h2>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="title">
        <h3>SURAT KETERANGAN KEMATIAN</h3>
        <p>Nomor: {{ $surattt->nomor_surat }}/{{ $surattt->id }}/KEL-TLI</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Lurah Tanjung Laut Indah Kecamatan Bontang Selatan, menerangkan bahwa:</p>

        <table>
            <tr>
                <td style="width: 150px;">Nama</td>
                <td>: {{ $surattt->nama }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $surattt->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $surattt->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $surattt->alamat }}</td>
            </tr>
        </table>

        <p>Berdasarkan Surat Pengantar dari Ketua RT. <strong> {{ $surattt->rt }} </strong>  Nomor: <strong>{{ $surattt->no_sk_rt }}</strong> tanggal <strong>{{ \Carbon\Carbon::parse($surattt->tanggal_pengantar)->translatedFormat('d F Y') }}</strong>, bahwa yang bersangkutan telah meninggal dunia pada:</p>

        <table>
            <tr>
                <td style="width: 150px;">Hari</td>
                <td>: {{ $surattt->hari_kematian }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ \Carbon\Carbon::parse($surattt->tanggal_meninggal)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>: {{ $surattt->tempat_kematian }}</td>
            </tr>
            <tr>
                <td>Penyebab</td>
                <td>: {{ $surattt->sebab_kematian }}</td>
            </tr>
        </table>

        <p>Surat Keterangan ini dibuat atas dasar yang sebenarnya.</p>

        <table>
            <tr>
                <td style="width: 150px;">Nama Pelapor</td>
                <td>: {{ $surattt->nama_pelapor }}</td>
            </tr>
            <tr>
                <td>Hubungan dengan yang Meninggal</td>
                <td>: {{ $surattt->hubungan }}</td>
            </tr>
        </table>
    </div>

    <!-- Tanda Tangan -->
    <div class="footer">
        <p>Bontang, {{ \Carbon\Carbon::parse($surattt->tanggal_surat)->translatedFormat('d F Y') }}</p>
        <p>An. Lurah</p>
        <br><br><br>
        <p><u>{{ $surattt->kasi->nama ?? 'N/A' }}</u></p>
        <p>NIP. {{ $surattt->kasi->nip ?? 'N/A' }}</p>
    </div>

</body>
</html>
