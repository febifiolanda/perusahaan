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
                    <h3 class="box-title">Laporan Mahasiswa </h3>
                </div>
                <!-- /.box-header -->
    <section class="content">
		<div class="row">
            <div class="col-xs-12">
              <div class="box ">
                <div class="box-header">
                    <h3 class="box-title">Kelompok yang telah mengumpulkan Laporan</h3>
					<div class="box-tools">
                        <form action="https://pklkomsi.000webhostapp.com/dosen/laporan/laporanListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Kelompok</th>
                      <th>Status</th>
					  <th>Judul</th>
					  <th>Link Laporan</th>
					  <th>Tanggal Upload</th>
                    </tr>
                                        <tr>
                      <td>1</td>
                      <td>2016</td>
                      <td>Diponegoro</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Diponegoro</td>
                      <td><a href="https://www.google.com/drive/" target="_blank" >https://www.google.com/drive/</a></td>
                      <td>15 Feb 2018</td>
                    </tr>
                                        <tr>
                      <td>2</td>
                      <td>2018</td>
                      <td>Moh Hatta</td>
                      <td>
						<span class='label label-default'>Selesai Magang</span>					  </td>
                      <td>Laporan PKL 2018 Moh Hatta</td>
                      <td><a href="https://www.google.com/drive/" target="_blank" >https://www.google.com/drive/</a></td>
                      <td>24 Feb 2018</td>
                    </tr>
                    </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                                    </div>
              </div><!-- /.box -->
            </div>
        </div>
		    </section>
            </div>
      
    <!-- /.content -->
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