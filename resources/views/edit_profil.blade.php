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
            <h1>Edit Profil Perusahaan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
<!-- 	
	<div class="col-12">
        <div class="card">
            <div class="card-body">
				<form  method="post" enctype="multipart/form-data" action="#">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">         
							<label>CV</label>                       
								<div class="input-group input-group">
									<input type="file" class="form-control required" id="cv" name="cv">
									<span class="input-group-append">
										<button type="button" class="btn btn-info btn-flat">Save</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>	
				</div>  
			</div>
		</div> -->


		<div class="col-12">
			<div class="card">
			<form  method="post" enctype="multipart/form-data" action="{{route('profile.update', $instansi->id_instansi)}}">
			{{ csrf_field() }}
				<div class="card-body">
					<div class="card-body card-primary  table-responsive p-0"></br>
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="fname">Alamat </label>
											<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $instansi->alamat}}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="fname">Deksripsi </label>
											<textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="deksripsi" class="textarea" id="deksripsi"  placeholder="deksripsi" value="{{ $instansi->deksripsi}}"></textarea>
											<!-- <input type="text" class="form-control" id="deksripsi" name="deksripsi" placeholder="deksripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
											value="{{ $instansi->deksripsi}}"> -->
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="fname">Nama Instansi</label>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $instansi->nama }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="fname">Website</label>
											<input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{ $instansi->website }}" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="fname">Email </label>
											<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $instansi->email }}" >
										</div>
									</div>
								</div>
							</div>
						</div>
						
					
						</table><br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								</div>
							</div>
						</div>	
					</div>
					</br>
					<div class="box-footer float-right">
						<button type="submit" class="btn btn-info"> Save </button>
					</div>
				</div>                     
          	</form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
