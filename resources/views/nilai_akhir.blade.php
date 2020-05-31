@extends('welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
    </section>
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
                <div class="box-header">
                    <h3 class="box-title">Nilai Akhir</h3>
                </div>
                <section class="content">
			<div class="row">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible">
					<h4><i class="icon fa fa-check"></i> Pastikan Anda telah memberi Nilai!</h4>
					Pastikan Anda telah memberi nilai bagi Mahasiswa yang telah selesai melakukan magang. Terimakasih :D
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-xs-12">
                <div class="box-header">
             
                    <h3 class="box-title">Penilaian Dosen Pembimbing Mahasiswa PKL</h3>
					<div class="box-tools">
                        <form action="https://pklkomsi.000webhostapp.com/instansi/penilaian/penilaianListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
          <div class="row">
					<div class="col-md-2"><b>Penilaian : </b></div>
					<div class="col-md-2"><span class='label label-success'>5</span> Sangat Baik</div>
					<div class="col-md-2"><span class='label label-info'>4</span> Baik</div>
					<div class="col-md-2"><span class='label label-warning'>3</span> Cukup</div>
					<div class="col-md-2"><span class='label label-danger'>2</span> Kurang</div>
					<div class="col-md-2"><span class='label label-default'>1</span> Sangat Kurang</div>
					</div>
				</div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Kelompok</th>
                      <th>Status PKL</th>
                      <th>Nilai Instansi</th>
                      <th>Nilai Dosen</th>
                      <th>Nilai Tim Penguji</th>
                      <th class="text-center" >Dospem</th>
                      <th class="text-center" >Dospen</th>
                    </tr>
                                        <tr>
                      <td>1</td>
                      <td>15/386088/SV/09474</td>
                      <td>Titi Hanifah</td>
                      <td>Diponegoro</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>1.3</td>
                      <td>1.06</td>
                      <td>1.25</td>
					  <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
            <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
                    </tr>
                                        <tr>
                      <td>2</td>
                      <td>15/384465/SV/08822</td>
                      <td>Asti Nugraheni</td>
                      <td>Diponegoro</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>1.4</td>
                      <td>1.13</td>
                      <td>0.85</td>
					  <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
            <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>

                    </tr>
                                        <tr>
                      <td>3</td>
                      <td>15/380437/SV/08244</td>
                      <td>Muhammad Gorby Ash-Shiddiqy</td>
                      <td>Diponegoro</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>1.4</td>
                      <td>1.06</td>
                      <td>1.35</td>
					  <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
            <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
					 
                    </tr>
                                        <tr>
                      <td>4</td>
                      <td>387999</td>
                      <td>Capteinn</td>
                      <td>Moh Hatta</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>1.35</td>
                      <td>1.13</td>
                      <td>1.3</td>
					  <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
            <td>
						<a href="/detail_nilai" type="button" class="btn btn-info" >Beri Nilai</a>
					  </td>
					 
                    </tr>
                                      </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                                    </div>
              </div><!-- /.box -->
            </div>
			<div class="col-md-4">
												  
				<div class="row">
					<div class="col-md-12">
											</div>
				</div>
			</div>
        </div>
		    </section>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection