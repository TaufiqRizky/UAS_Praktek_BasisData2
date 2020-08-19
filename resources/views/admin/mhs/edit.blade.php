@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Edit Data mahasiswa</div>
        <div class="card-body card-block">
            <form action="/admin/mahasiswa/{{$mahasiswa->nim}}" method="post" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nim" class=" form-control-label">nim</label>
                    <input type="text" id="nim" name="nim" placeholder="Masukan nim" value="{{$mahasiswa->nim}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama" class=" form-control-label">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama" value="{{$mahasiswa->nama}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat" class=" form-control-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{$mahasiswa->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="jk" class=" form-control-label">Jenis Kelamin</label>
                    <select class="form-control" id="jk" name="jk" value="{{$mahasiswa->jk}}">
                        <option disabled >-- Pilih Jenis Kelamin --</option>
                        @if( $mahasiswa->jk == 'L')
                        <option value="L" selected>Laki - laki</option>
                        <option value="P">Perempuan</option>
                        @else
                        <option value="L" >Laki - laki</option>
                        <option value="P" selected>Perempuan</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="tlp" class=" form-control-label">No Telpon</label>
                    <input type="text" id="tlp" name="tlp" placeholder="Masukan Nim" value="{{$mahasiswa->tlp}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tgl" class=" form-control-label">Tanggal Lahir</label>
                    <input type="date" id="tgl" name="tgl" placeholder="Masukan Nim" value="{{$mahasiswa->tgl_lahir}}" class="form-control">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="jurusan" class=" form-control-label">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option>-- pilih Jurusan --</option>
                            @foreach($jurusan as $row)
                                @if($mahasiswa->id_jurusan == $row->id)
                                <option value="{{$row->id}}" selected>{{$row->fakultas}} - {{$row->jurusan}}</option>
                                @else
                                <option value="{{$row->id}}" >{{$row->fakultas}} - {{$row->jurusan}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-6">
                        <label for="kelas" class=" form-control-label">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option>-- pilih Kelas --</option>
                            @foreach($kelas as $row)
                                @if($mahasiswa->id_kelas == $row->id)
                                <option value="{{$row->id}}" selected>{{$row->kelas}} </option>
                                @else
                                <option value="{{$row->id}}" >{{$row->kelas}} </option>
                                @endif
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
