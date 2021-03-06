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
                	<td>Action</td>
               </tr>
              </thead>
              <tbody>
                @foreach($fak as $row => $val)
                <tr>
                  <td>{{$row+1}}</td>
                  <td>{{$val->matkul}}</td>
                  <td>{{$val->sks}}</td>
                  <td class="js-sweetalert">
                                            
                                     <button class="btn btn-primary" data-id="{{$val->id}}" data-sks="{{$val->sks}}"  data-fak="{{$val->matkul}}" data-type="edit" > <i class="fas fa-pencil-alt"></i> Edit</button>
                                        
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
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('admin.matkul.store') }}">
                        @csrf
                        <div class="form-group col-md-12">
                          <label for="matkul">Mata kuliah</label>
                          <input type="text" class="form-control" name="matkul" id="matkul" placeholder="Masukan Nama matkul">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="sks">sks</label>
                          <input type="number" min="1" class="form-control" name="sks" id="sks" placeholder="Masukan jumlah Sks">
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
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="smallmodalLabel">Edit matkul</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('admin.matkul.update') }}">
                        @csrf
                        <div class="form-group col-md-12">
                          <label for="matkul">matkul</label>
                          <input type="text" class="form-control" name="ematkul" id="ematkul" placeholder="Masukan Nama matkul">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="sks">sks</label>
                          <input type="number" min="1" class="form-control" name="esks" id="esks" placeholder="Masukan jumlah Sks">
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
<script type="text/javascript">
  $(document).ready( function () {
            $('#t_mhs').DataTable();
        } );
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
                  url:"matkul/destroy/"+id,
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
  function edit(id,fakul,sks) {
    $("#editModal").modal("show");
    $("#ematkul").val(fakul);
    $("#eid").val(id);
    $("#esks").val(sks);
  }
  $('.js-sweetalert button').on('click', function () {
           var type = $(this).data('type');
           var fakul = $(this).data('fak');
           var sks = $(this).data('sks');
           id=$(this).data('id');
           console.log(id);
           console.log(type);
           if (type == 'hapus') {

          Delete_fakul(id);
        }else{
          edit(id,fakul,sks);
        }

          
       });
</script>
@endsection