@extends('admin-tmp.tmp')
@section('judul', 'Hotel')
@section('isi')
<div class="row">
    <div class="col6">
        <div class="card">
        <div class="card-header">Data Hotel
                <a class="btn btn-sm btn-primary float-right" href="{{url('tambah')}}">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id Kamar</th>
                            <th>Nama Kamar</th>
                            <th>Jenis Kamar</th>
                            <th>Ukuran Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Waktu Menginap</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($htl as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_kamar }}</td>
                            <td>{{ $row->jenis_kamar }}</td>
                            <td>{{ $row->ukuran_kamar }}</td>
                            <td>{{ $row->jumlah_kamar }}</td>
                            <td>{{ $row->waktu_nginap }}</td>
                            <td>{{ $row->total_harga }}</td>
                           
                            <td>
                        <form action="{{route('delete.hotel', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')">
                            Hapus</button>

                            <a href="{{ route('edit.hotel', $row->id )}}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        
                        </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection