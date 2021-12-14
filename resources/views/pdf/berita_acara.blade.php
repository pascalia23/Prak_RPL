<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barita Acara</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
    <img src="{{ asset('cop.jpg') }}">
    <h1 style="text-align: center;">Berita Acara</h1>
    <p style="position: relative; top: -10px ;text-align: center; font-weight: bold;">{{ $surat->perihal }}</p>
    <p style="position: relative; top: -25px ;text-align: center; font-weight: bold;"><i>"{{ $surat->nama_kegiatan }}"</i></p>
    <p style="position: relative; top: -35px ;text-align: center;"><i>{{ $surat->no_surat }}</i></p>
    <div style="margin: 0 20px; position: relative; top: -30px">
        <p style="text-align: justify;">Pada hari ini: {{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }} bertempat di {{ $surat->lokasi_kegiatan }}, Universitas Kristen Duta Wacana telah dilangsungkan {{ $surat->perihal }} dengan tema: <i>"{{ $surat->nama_kegiatan }}"</i> dengan mengundang pembicara yaitu {{ $surat->nama_mitra }}. Acara ini diikuti oleh seluruh civitas akademik UKDW dan perwakilan dari beberapa mitra kerjasama Fakultas Teknologi Informasi UKDW.</p>
        <p style="text-align: justify;">Adapun TOR acara, daftar kehadiran peserta, foto kegiatan seperti terlampir pada berita acara ini.</p>
        <p style="text-align: justify;">Demikian Berita Acara ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>
        <p style="text-align: center;">Yogyakarta, {{ date('d F Y', strtotime($surat->updated_at)) }}</p>
        <p style="text-align: center;">Mengetahui</p>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align:left">
                <p>{{ $surat->signature->jabatan }}</p>
                <img src="{{ $surat->signature->ttd }}" style="height: 100px; width:160px">
                <p>({{ $surat->signature->nama }})</p>
            </div>
            <div style="text-align:right">
                <p>Perwakilan Mitra</p><br><br><br>
                <p>({{ $surat->nama_mitra }})</p>
            </div>
        </div>
    </div>
</body>
</html>