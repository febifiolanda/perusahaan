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
            <h1>Profile Perusahaan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            @if (Session::has('alert-success'))
              <div class="col-md-3 alert alert-success">
                  <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
              </div>
                <!-- @alert(['type' => 'success'])
                    {!! session('success') !!}
                @endalert -->
            @endif
        <div class="col-12">
    
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <div class="image">
                    <img class="img-circle" width="100px" height="100px"  src="{{ asset('/images/users/'.$instansi->foto) }}">
                    </div>
                    </div>
                                            
                    <form action="/profile/{{$instansi->id_instansi}}" method="POST" enctype="multipart/form-data">                                            
                    {{ csrf_field() }}
                        @csrf
                        <div class="box-body">
                            <div class="row justify-content-center">
                                <div class="col-md-9">     
                                    </br>                           									
                                    <div class="input-group input-group-sm">
                                        <input type="file" class="form-control required" id="foto" name="foto">
                                        <input type="hidden" class="form-control required" id="id_instansi" name="id_instansi" value="{{$instansi->id_instansi}}">                         
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat" >Save</button>
                                        </span>
                                    </div>
                                    <p class="text-muted"><small><i>*Max ukuran 1 MB, JPG|PNG</i></small></p>					
                                </div>
                            </div>    
                        </div>
                    </form>
                                        
                    <form role="form" method="post" id="editFoto" enctype="multipart/form-data">                                            
                        <div class="box-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">     
                                </br>                    
                                <h3 class="profile-username text-center"><b>{{ $instansi->nama }}</b></h3>
                                    <div class="row justify-content-center">
                                        <div class="col-md-9">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Alamat </b> <a class="float-right">{{ $instansi->alamat }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-9">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Deksripsi : </b> <a class="float-right">{{ $instansi->deskripsi }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <div class="row justify-content-center">

                                    <iframe src="http://docs.google.com/gview?url=https://sutaryofe.staff.uns.ac.id/files/2011/09/SISTEMATIKA-PENULISAN-PAPER.pdf&embedded=true" 
                                        style="width:700px; height:700px;" frameborder="0"></iframe>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <form>
                <div class="box-body">
                    <div class="card card-primary card-outline">
                        <div class="card-body ">
                            <div class="tab-content">
                                <div class="card-body card-primary table-responsive p-0">
                                    <table class="table no-border">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Website</th>
                                            <th>Email</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $instansi->nama }}</td>
                                            <td>{{ $instansi->website }}</td>
                                            <td>{{ $instansi->email }}</td>
                                        </tr>
                                    </table><br/>
                                </div>
                                </br>
                                <div class="box-footer float-right">
                                    <a href="/edit_profil/{{$instansi->id_instansi}}" class="btn btn-info">Edit</a>                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <!-- /.content -->
  </div>
  <!-- <script type="text/javascript">
  jQuery(document).ready(function($) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/dosen/6',
      type: 'GET',
    })
    .done(function(result) {
      console.log(result);
      $(".tvNamaDosen").text(result.user.nama);
      $(".tvNip").text(result.user.nip);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
  </script> -->
  @endsection
