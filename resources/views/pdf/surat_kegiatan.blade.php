<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kegiatan</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
    <img src="{{ asset('cop.jpg') }}">
    <div style="margin: 0 20px; position: relative; top: 20px">
        <table style="border: none;">
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td><i>{{ $surat->no_surat }}</i></td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>{{ $surat->perihal }}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>***</td>
            </tr>
        </table><br><br>
        <p>{{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}</p><br><br>
        <p>Kepada Yth,: <br>{{ $surat->nama_mitra }} <br> {{ $surat->alamat_mitra }}</p><br><br>
        <p>Salam sejahtera</p>
        <p style="text-align: justify;">Menindak lanjuti pembicaraan beberapa waktu yang lalu antara FTI UKDW dengan pihak Rumah Sakit Panti Rapih perihal pelaksanaan MBKM, dengan ini kami mohon kesediaan Rumah Sakit untuk meluangkan waktu guna menyelenggarakan diskusi / audiensi MBKM tersebut diatas. Adapun waktu pelaksanaanya adalah:</p>
        <table style="border: none; margin: 0 auto; width: 50%;">
            <tr>
                <td>Hari/tanggal</td>
                <td>:</td>
                <td>{{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}1</td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>:</td>
                <td>{{ date('H:i', strtotime($surat->tgl_pelaksanaan_kegiatan)) }} WIB</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $surat->lokasi_kegiatan }}</td>
            </tr>
        </table>
        <p style="text-align: justify;">Demikian permohonan ini kami sampaikan. Atas perhatian dan kerjasama yang diberikan kami mengucapkan terima kasih.</p>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align: center;">
                <p>Yogyakarta, {{ date('d F Y', strtotime($surat->updated_at)) }}</p>
                <p>{{ $surat->signature->jabatan }}</p>
                <img src="{{ $surat->signature->ttd }}" style="height: 100px; width:160px">
                <p style="margin: 0 20px; position: relative; top: -20px">({{ $surat->signature->nama }})</p>
            </div>
        </div>
    </div>
</body>
</html>