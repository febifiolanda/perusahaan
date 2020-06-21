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
              <form method="POST" action="{{ route('change.password') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
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
      var password = $('#password2').val();
      $.ajax({
          type: "POST",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          url: "/api/changepassword/"+id,
          dataType:'JSON',
          contentType: false,
          cache: true,
          processData: true,
          data: {password : password},
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







