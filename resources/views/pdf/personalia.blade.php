<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalia</title>
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
        <p><b>Kepada Yth,: <br>Rektor <br> Universitas Kristen Duta Wacana <br>Yogyakarta</b></p><br><br>
        <p>Salam sejahtera</p>
        <p style="text-align: justify;">Menyusuli surat kami {{ $surat->no_surat }}, perihal {{ $surat->perihal }} atas nama <b>{{ $surat->user->name }}</b>. Melalui surat ini kami menyampaikan <b>surat persetujuan dari yang bersangkutan</b> untuk melengkapi persyaratan.</p>
        <p style="text-align: justify;">Demikian surat ini kami sampaikan. Atas perhatian dan kerjasama yang diberikan kami mengucapkan terima kasih.</p>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align: center;">
                <p>Yogyakarta, {{ date('d F Y', strtotime($surat->updated_at)) }}</p>
                <p>{{ $surat->signature->jabatan }}</p>
                <img src="{{ $surat->signature->ttd }}" style="height: 100px; width:160px">
                <p>({{ $surat->signature->nama }})</p>
            </div>
        </div>
    </div>
</body>
</html>