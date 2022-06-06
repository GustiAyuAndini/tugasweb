@extends('admin-tmp.tmp')

@section('author', 'Tambah Data Hotel')

@section('isi')

<div class="row mt10">
    <div class="col10">
        <div class="card">
            <div class="card-header">Tambah Data Karyawan
                <a class="btn btn-sm btn-info float-right" href="{{url('hotel')}}"><i class="fas fa-backward"></i>Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{url('simpan-toko')}}" method="POST">
                    @csrf
                    <div class="from-group">
                        <label>Nama Kamar</label>
                        <input type="text" name="nama_kamar" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Jenis Kamar</label>
                        <input type="text" name="jenis_kamar" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Jumlah Kamar</label>
                        <input type="text" name="jumlah_kamar" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Ukuran Kamar</label>
                        <input type="text" name="ukuran_kamar" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Waktu Nginap</label>
                        <input type="text" name="waktu_nginap" class="form-control">
                    </div>

                    <div class="from-group">
                        <label>Total Harga</label>
                        <input type="text" name="total_harga" class="form-control">
                    </div>
                    <br><br>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                    <a class="btn btn-warning float-right" href="{{url('hotel')}}">
                        <i class="fas fa-backward"></i>Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection