@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
     <div class="card">
         <div class="card-header">Data Dosen</div>
         <div class="card-body card-block">
             <table class="table table-stripped table-bordered" id="t_mhs">
              <thead>
               <tr>
                  <td>No</td>
                	<td>NIP</td>
                	<td>Nama</td>
                	<td>Alamat</td>
                	<td>No Telpon</td>
                	<td>Gender</td>
                	<td>Tanggal Lahir</td>
                	<td>Action</td>
               </tr>
              </thead>
              <tbody>
                @foreach($dosen as $row => $val)
                <tr>
                  <td>{{$row+1}}</td>
                  <td>{{$val->nip}}</td>
                  <td>{{$val->nama}}</td>
                  <td>{{$val->alamat}}</td>
                  <td>{{$val->tlp}}</td>
                  <td>{{$val->jk}}</td>
                  <td>{{$val->tgl_lahir}}</td>
                  <td >
                                            
                                     <a class="btn btn-primary" href="/admin/dosen/{{$val->nip}}/edit" > <i class="fas fa-pencil-alt"></i> Edit</a>
                                      
                                     <button class="btn btn-danger" onclick="deleteForm('{{$val->nip}}')" data-type="hapus"><i class="far fa-trash-alt"></i> Hapus</button>
                      </td>
                </tr>
                @endforeach
                                        		
              </tbody>
             </table>
         </div>
     </div>
 </div>
@endsection
@section('modal')
<div class="modal fade" id="conifrmModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Delete Dosen</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="/admin/dosen/" id="deleteForm">
                        @csrf
                        @method('delete')
                        Yakin Ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">ya</button>
                    </div>
                    </form>
                      
                  </div>
                </div>
              </div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready( function () {
            $('#t_mhs').DataTable();
        } );
  function deleteForm(id) {
    $('#conifrmModal').modal('show');
    $('#deleteForm').attr('action','/admin/dosen/'+id);
  }
</script>
@endsection