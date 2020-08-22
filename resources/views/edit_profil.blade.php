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
                            <form id="editinstansi"  >
                            @csrf
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
                                        <label for="no_hp" class="col-sm-3 col-form-label">Website *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="website" value="{{ $instansi->website }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">Alamat *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="alamat" value="{{ $instansi->alamat }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">Deskripsi *</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" required name="deskripsi" value="{{ $instansi->deskripsi }}">
                                        </div>
                                    </div>
                                 

                                    <input type="hidden" name="id_instansi" id="id_instansi" value="{{ $instansi->id_instansi }}">
                                    <!-- <input type="hidden" name="id_users" id="id_users" value="{{ Request::segment(2) }}"> -->
                                    
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                        <a href="/profile" class="btn btn-danger" >Cancel</a>
                                        </span>
                                        <span>
                                        <button type="submit" id="submit" class="btn btn-primary" >Save</button>
                                        </span>
                                   </div>
                                </div>
                                </form>  
                                <!-- /.card-body -->
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

  @section('scripts')
<script>

$('#editinstansi').on('submit', function(e){
      var id = $('#id_instansi').val();

      e.preventDefault();
      $.ajax({
          type: "POST",
          url: "/api/ubah_profile/"+id,
          // dataType:'json',
          // contentType: false,
          // cache: false,
          // processData: false,
          
          data: $(this).serialize(),
          // data: new FormData(this),
          success: function(data){
            console.log(data);
            window.location.reload();
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
</script>
@endsection