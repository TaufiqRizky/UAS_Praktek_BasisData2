@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Tambah Data Dosen</div>
        <div class="card-body card-block">
            <form action="/admin/dosen/{{$dosen->nip}}" method="post" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nip" class=" form-control-label">Nip</label>
                    <input type="text" id="nip" name="nip" placeholder="Masukan Nip" value="{{$dosen->nip}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama" class=" form-control-label">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama" value="{{$dosen->nama}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat" class=" form-control-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{$dosen->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="jk" class=" form-control-label">Jenis Kelamin</label>
                    <select class="form-control" id="jk" name="jk" value="{{$dosen->jk}}">
                        <option disabled >-- Pilih Jenis Kelamin --</option>
                        @if( $dosen->jk == 'L')
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
                    <input type="text" id="tlp" name="tlp" placeholder="Masukan Nim" value="{{$dosen->tlp}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tgl" class=" form-control-label">Tanggal Lahir</label>
                    <input type="date" id="tgl" name="tgl" placeholder="Masukan Nim" value="{{$dosen->tgl_lahir}}" class="form-control">
                </div>
                

                                        
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
