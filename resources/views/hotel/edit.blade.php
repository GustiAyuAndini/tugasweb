@extends('admin-tmp.tmp')

@section('judul', 'Edit Data Hotel')

@section('isi')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row mt10">
    <div class="col10">
        <div class="card">
            <div class="card-header">Edit Data Hotel
                <a class="btn btn-sm btn-info float-right" href="{{url('hotel')}}"><i class="fas fa-backward"></i>Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('update.hotel', $id->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="from-group">
                        <label>Nama Kamar</label>
                        <input type="text" name="nama_kamar" class="form-control" value="{{ $id->nama_kamar }}">
                    </div>

                    <div class="from-group">
                        <label>Jenis Kamar</label>
                        <input type="text" name="jenis_kamar" class="form-control" value="{{ $id->jenis_kamar }}">
                    </div>

                    <div class="from-group">
                        <label>Jumlah Kamar</label>
                        <input type="text" name="jumlah_kamar" class="form-control" value="{{ $id->jumlah_kamar }}">
                    </div>

                    <div class="from-group">
                        <label>Ukuran Kamar</label>
                        <input type="text" name="ukuran_kamar" class="form-control" value="{{ $id->ukuran_kamar }}">
                    </div>

                    <div class="from-group">
                        <label>Waktu Nginap</label>
                        <input type="text" name="waktu_nginap" class="form-control" value="{{ $id->waktu_nginap }}">
                    </div>

                    <div class="from-group">
                        <label>Total Harga</label>
                        <input type="text" name="total_harga" class="form-control" value="{{ $id->total_harga }}">
                    </div>

                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                    <a class="btn btn-warning float-right" href="{{ url('hotel') }}"><i class="fas fa-backward"></i>Batal</a>
                </form>
            </div>
        </div>
    </div>
    @endsection