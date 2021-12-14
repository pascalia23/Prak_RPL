<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kegiatan</title>
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
    <div style="margin: 0 20px; position: relative; top: 20px">
        <table style="border: none;">
            <tr>
                <td width="150px">Nama Kegiatan</td>
                <td>:</td>
                <td><i>{{ $surat->nama_kegiatan }}</i></td>
            </tr>
            <tr>
                <td>Hari, Tanggal</td>
                <td>:</td>
                <td>{{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ date('H:i', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $surat->lokasi_kegiatan }}</td>
            </tr>
            <tr>
                <td>Pembicara</td>
                <td>:</td>
                <td>{{ $surat->nama_mitra }}</td>
            </tr>
        </table><br><br>
        <table class="tb" style="width: 100%; position: relative; top: -20px">
            <tr>
              <th width="20px">No.</th>
              <th width="220px">Nama</th> 
              <th colspan="2">Tanda Tangan</th>
            </tr>
            @foreach ($anggota as $item)
            <tr>
                <td class="tb">{{ $loop->iteration }}</td>
                <td class="tb">{{ $item->nama_peserta }}</td>
                <td class="tb">{{ $loop->iteration%2==0?'':$loop->iteration.'.' }}</td>
                <td class="tb">{{ $loop->iteration%2==0?$loop->iteration.'.':'' }}</td>
              </tr>
            @endforeach
          </table>
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