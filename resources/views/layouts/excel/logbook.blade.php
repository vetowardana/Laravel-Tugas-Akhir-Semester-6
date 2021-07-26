<table>
    <thead>
        <tr>
            <th style="text-align: center; border: 1px solid #000000; width: 10px;"><strong>No</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama Perusahaan</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama Lowongan</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Tanggal Dibuat</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Waktu Dibuat</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Nama Kegiatan</strong></th>
            <th style="text-align: center; border: 1px solid #000000; width: 30px;"><strong>Uraian Kegiatan</strong></th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($logbooks as $l)
        <tr>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 10px;">{{ $no++ }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->name }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->nama_perusahaan }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->nama_lowongan }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->tanggal_kegiatan }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->waktu_kegiatan }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{{ $l->jenis_kegiatan }}</td>
            <td style="text-align: center; vertical-align: top; border: 1px solid #000000; width: 30px;">{!! $l->uraian_kegiatan !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>