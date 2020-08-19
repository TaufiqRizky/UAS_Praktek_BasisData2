@extends('layouts.admin')
@section('css')
<style type="text/css">
  .float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:70px;
  right:40px;
  outline: none;
  
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}
.float:focus {
  outline: none;
}

.my-float{
  margin-top:22px;
}
</style>
@endsection
@section('content')
<div class="col-lg-12">
     <div class="card">
         <div class="card-header">Data Mahasiswa</div>
         <div class="card-body card-block">
             <table class="table table-stripped table-bordered" id="t_mhs">
              <thead>
               <tr>
                	<td>No</td>
                  <td>Mata Kuliah</td>
                  <td>SKS</td>
                  <td>Ruangan</td>
                  <td>Gedung</td>
                  <td>Dosen</td>
                	<td>Hari</td>
                  <td>Jam</td>
                	<td>Action</td>
               </tr>
              </thead>
              <tbody>
                @foreach($fak as $row => $val)
                <tr>
                  <td>{{$row+1}}</td>
                  <td>{{$val->matkul}}</td>
                  <td>{{$val->sks}}</td>
                  <td>{{$val->no_ruangan}}</td>
                  <td>{{$val->gedung}}</td>
                  <td>{{$val->nama}}</td>
                  <td>{{$val->hari}}</td>
                  <td>{{$val->jam_mulai}}</td>
                  <td class="js-sweetalert">
                                            
                                     <button class="btn btn-primary" data-id="{{$val->id}}" data-nip="{{$val->nip}}" data-mk="{{$val->id_matkul}}" data-ruang="{{$val->id_ruangan}}" data-jam="{{$val->jam_mulai}}"  data-hari="{{$val->hari}}" data-type="edit" > <i class="fas fa-pencil-alt"></i> Edit</button>
                                        
                                     <button class="btn btn-danger" data-id="{{$val->id}}" data-type="hapus"><i class="far fa-trash-alt"></i> Hapus</button>
                      </td>
                </tr>
                @endforeach
                                        		
              </tbody>
             </table>
             
             
            <!-- /.modal -->
             <button type="button" class="float btn-primary" data-toggle="modal" data-target="#smallmodal">
                 <i class="fa fa-plus  text-white"></i>
                </button>
         </div>
     </div>
 </div>
@endsection
@section('modal')
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('admin.jadwal.store') }}">
                        @csrf
                        <div class="form-group col-md-12">
                          <label for="matkul">Mata kuliah</label>
                          <select class="form-control" name="matkul" id="matkul">
                            <option selected disabled>--Pilih Matkul--</option>
                            @foreach($matkul as $row)
                              <option value="{{$row->id}}">{{$row->matkul}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="dosen">Dosen</label>
                          <select class="form-control" name="dosen" id="dosen">
                            <option selected disabled>--Pilih Dosen--</option>
                            @foreach($dosen as $row)
                              <option value="{{$row->nip}}">{{$row->nip}} - {{$row->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="ruangan">Ruangan</label>
                          <select class="form-control" name="ruangan" id="ruangan">
                            <option selected disabled>--Pilih Ruangan--</option>
                            @foreach($ruangan as $row)
                              <option value="{{$row->id}}">{{$row->no_ruangan}} - {{$row->gedung}}</option>
                            @endforeach
                          </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                          <label for="jam">Jam Mulai</label>
                          <input type="text" class="form-control " name="jam" id="jam">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="hari">Hari</label>
                          <select name="hari" id="hari" class="form-control">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                      
                  </div>
                </div>
              </div>

              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Edit jadwal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('admin.jadwal.update') }}">
                        @csrf
                        <div class="form-group col-md-12">
                          <label for="ematkul">Mata kuliah</label>
                          <select class="form-control" name="ematkul" id="ematkul">
                            <option selected disabled>--Pilih Matkul--</option>
                            @foreach($matkul as $row)
                              <option value="{{$row->id}}">{{$row->matkul}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="edosen">Dosen</label>
                          <select class="form-control" name="edosen" id="edosen">
                            <option selected disabled>--Pilih Dosen--</option>
                            @foreach($dosen as $row)
                              <option value="{{$row->nip}}">{{$row->nip}} - {{$row->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="eruangan">Ruangan</label>
                          <select class="form-control" name="eruangan" id="eruangan">
                            <option selected disabled>--Pilih Ruangan--</option>
                            @foreach($ruangan as $row)
                              <option value="{{$row->id}}">{{$row->no_ruangan}} - {{$row->gedung}}</option>
                            @endforeach
                          </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                          <label for="ejam">Jam Mulai</label>
                          <input type="text" class="form-control " name="ejam" id="ejam">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="ehari">Hari</label>
                          <select name="ehari" id="ehari" class="form-control">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            
                          </select>
                        </div>
                        <input type="text" name="id" id="eid" hidden>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                      
                  </div>
                </div>
              </div>
@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    
            $('#t_mhs').DataTable();
        
    $('#jam').timepicker({
    timeFormat: 'HH:mm',
    interval: 15,
    minTime: '7',
    maxTime: '18',
    defaultTime: '7',
    startTime: '07:00',
    use24hours: true,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
    $('#ejam').timepicker({
    timeFormat: 'HH:mm',
    interval: 15,
    minTime: '7',
    maxTime: '18',
    defaultTime: '7',
    startTime: '07:00',
    use24hours: true,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
});
  
  function Delete_fakul(id) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
                  url:"jadwal/destroy/"+id,
                  type:'DELETE',
                  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                  data:{id:id},
                  success: function (data) {
                     swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    );
                     setTimeout(function() {
                        location.reload();
                        }, 1500);
                     

                      },
                      error: function (data) {
                           swal.fire(
                  'Gagal!',
                  'Failed to delete your file.',
                  'error'
                );
                      }
              });
        
      } else if (
        
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    });
    
      
  }
  function edit(id,nip,mk,hari,r,jam) {
    $("#editModal").modal("show");
    $("#edosen").val(nip);
    $("#eid").val(id);
    $("#ematkul").val(mk);
    $("#ehari").val(hari);
    $("#eruangan").val(r);
    $("#ejam").val(jam);
  }
  $('.js-sweetalert button').on('click', function () {
           var type = $(this).data('type');
           var nip = $(this).data('nip');
           var mk = $(this).data('mk');
           var hari = $(this).data('hari');
           var r = $(this).data('ruang');
           var jam = $(this).data('jam');
           id=$(this).data('id');
           console.log(id);
           console.log(type);
           if (type == 'hapus') {

          Delete_fakul(id);
        }else{
          edit(id,nip,mk,hari,r,jam);
        }

          
       });
</script>
@endsection