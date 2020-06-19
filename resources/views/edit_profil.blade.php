@extends('welcome')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profil instansi</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <form id="editinstansi" method="post" >
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="nama" value="{{ $instansi->nama }}">                                       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="email" class="col-sm-3 col-form-label">Email *</label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" required name="email" value="{{ $instansi->email }}">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">No HP *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="no_hp" value="{{ $instansi->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">Username *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="username" value="{{ $instansi->users->username }}">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_users" id="id_users" value="{{ $instansi->id_users }}">
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                        <input type="submit" class="btn btn-danger" value="Cancel" />
                                        </span>
                                        <span>
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                        </span>
                                   </div>
                                </div>
                                <!-- /.card-body -->
                            </form>

                              <div class="modal fade" id="modal-edit">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Change Password</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->


                              <div class="modal fade" id="modal-editAvatar">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form id="updateAvatar" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                      <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="form-group">
                                        <input type="hidden" name="id_admin" id="id_admin" value="{{$instansi->id_admin}}"><br>
                                          <label for="exampleInputFile">Foto</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                              <input type="file" name="foto" id="foto" class="form-control" value="{{ $instansi->foto }}">
                                              <label class="custom-file-label" for="foto">Choose file</label>
                                          </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button id="saveBtnFoto" type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                        </div>
                    </div>
                </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection


<!-- <script>
$('#editinstansi').on('submit', function(e){
      e.preventDefault();
      var id = $('#id_users').val();
      $.ajax({
          type: "POST",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          url: "/api/profil/"+id,
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          data: new FormData(this),
          success: function(data){
              window.location = "/profile";
              toastr.options.closeButton = true;
              toastr.options.closeMethod = 'fadeOut';
              toastr.options.closeDuration = 100;
              toastr.success(data.message);
          },
          error: function(error){
          console.log(error);
          }
      });
    });
</script> -->