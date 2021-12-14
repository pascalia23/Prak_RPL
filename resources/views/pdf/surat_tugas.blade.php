<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
    <style>
        .tb, th {
        border: 1px solid black;
        border-collapse: collapse;
        padding-left: 10px;
        height: 30px;
        }
    </style>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
    <img src="{{ asset('cop.jpg') }}">
    <h2 style="text-align: center;"><u>Surat Tugas</u></h2>
    <p style="position: relative; top: -15px ;text-align: center;"><i>{{ $surat->no_surat }}</i></p>
    <div style="margin: 0 20px; position: relative; top: -10px">
        <p style="text-align: justify;">Sehubung permintaan dari {{ $surat->nama_mitra }}, untuk ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada {{ $surat->user->role->nama }} dibawah ini:</p>
        @if ($anggota->count()>0)
        <table class="tb" style="width: 100%; position: relative; top: 5px">
            <tr>
                <th width="20px">No.</th>
                <th width="220px">{{ $surat->user->role_id!=3?'NIK':'NIM' }}</th> 
                <th>Nama</th>
            </tr>
            @foreach ($anggota as $item)
            <tr>
                <td class="tb">{{ $loop->iteration }}</td>
                <td class="tb">{{ $item->user->username }}</td>
                <td class="tb">{{ $item->user->nama }}</td>
              </tr>
            @endforeach
        </table>
        @else
        <table style="border: none; margin: 0 auto; width: 50%;">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $surat->user->nama }}</td>
            </tr>
            <tr>
                <td>{{ $surat->user->role_id!=3?'NIK':'NIM' }}</td>
                <td>:</td>
                <td>{{ $surat->user->username }}</td>
            </tr>
        </table>
        @endif
        <p style="text-align: justify; margin-top:20px">Untuk bertugas sebagai {{ $surat->perihal }}, yang diselenggarakan pada:</p>
        <table style="border: none; margin: 0 auto; width: 50%;">
            <tr>
                <td>Hari/tanggal</td>
                <td>:</td>
                <td>{{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}</td>
            </tr>
            <tr>
                <td>Tema</td>
                <td>:</td>
                <td>{{ $surat->tujuan }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $surat->lokasi_kegiatan }}</td>
            </tr>
        </table>
        <p style="text-align: justify;">Demikian Surat Tugas ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>
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