@extends('welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Password</h3>
            </div>
            <div class="card-body">
              @if (session('error'))
              <div class="alert alert-danger">
              {{ session('error') }}
              </div>
              @endif
              @if (session('success'))
              <div class="alert alert-success">
              {{ session('success') }}
              </div>
              @endif
            <div class="container">
            <div class="row justify-content-center">
              <div class="col-8">
                <!-- <form id="editpassword" method="POST" action="{{ ('/ubahPassword')}}"> -->
                <form id="updatePassword" method="post">
                <!-- {{ csrf_field() }}  -->
                  <!-- <input type="hidden" name="id_buku_harian" id="id_buku_harian"> -->
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password *</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="id_users" id="id_users" value="{{$instansi->id_users}}">
                        <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                    </div>
                    </br>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Confirm Password *</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                    </div>
                    </br>            
                    <!-- <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="2" > -->
                      <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                          <button type="reset" class="btn btn-danger"> Cancel </button>                                      </span>
                        <span>
                          <input type="submit" class="btn btn-primary" value="Submit" />
                        </span>
                      </div>
                      </div> 
                    </div>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
$(document).ready(function(){ 
  $('#updatePassword').on('submit', function(e){
      e.preventDefault();
      var id = $('#id_users').val();
      var password = $('#password').val();
      $.ajax({
          type: "POST",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          url: "/api/changepassword/"+id,
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          data: {'password' : password},
          success: function(data){
              window.location.reload;
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
});
</script>
@endsection







