@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Form Tambah Mahasiswa</div>
        <div class="card-body card-block">
            <form action="{{route('admin.mahasiswa.store')}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label for="nim" class=" form-control-label">Nim</label>
                    <input type="text" id="nim" name="nim" placeholder="Masukan Nim" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama" class=" form-control-label">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan Nim" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat" class=" form-control-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="jk" class=" form-control-label">Jenis Kelamin</label>
                    <select class="form-control" id="jk" name="jk">
                        <option disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki - laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tlp" class=" form-control-label">No Telpon</label>
                    <input type="text" id="tlp" name="tlp" placeholder="Masukan Nim" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tgl" class=" form-control-label">Tanggal Lahir</label>
                    <input type="date" id="tgl" name="tgl" placeholder="Masukan Nim" class="form-control">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="jurusan" class=" form-control-label">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option>-- pilih Jurusan --</option>
                            @foreach($jurusan as $row)
                                <option value="{{$row->id}}">{{$row->fakultas}} - {{$row->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-6">
                        <label for="kelas" class=" form-control-label">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option>-- pilih Kelas --</option>
                            @foreach($kelas as $row)
                                <option value="{{$row->id}}">{{$row->kelas}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                

                                        
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection