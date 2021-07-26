<table>
    <thead>
        <tr>
            <th style="text-align: center; border: 1px solid #000000; width: 10px;"><strong>No</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama Perusahaan</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama Lowongan</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Tanggal Presensi</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Waktu Presensi</strong></th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($presensis as $p)
        <tr>
            <td style="text-align: center; border: 1px solid #000000; width: 10px;">{{ $no++ }}</td>
            <td style="text-align: center; border: 1px solid #000000; width: 30px;">{{ $p->name }}</td>
            <td style="text-align: center; border: 1px solid #000000; width: 30px;">{{ $p->nama_perusahaan }}</td>
            <td style="text-align: center; border: 1px solid #000000; width: 30px;">{{ $p->nama_lowongan }}</td>
            <td style="text-align: center; border: 1px solid #000000; width: 30px;">{{ $p->tanggal_presensi }}</td>
            <td style="text-align: center; border: 1px solid #000000; width: 30px;">{{ $p->waktu_presensi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>