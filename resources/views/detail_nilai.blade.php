@extends('welcome')
@section('content')

<section class="content-header">
    </section>
    <section class="content">
    
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
            
            <div class="card card-primary card-outline">
                <div class="box-header">
                    <h3 class="box-title">Penilaian Mahasiswa Details</h3>
                </div><!-- /.box-header -->
                
      <div class="card-body">
      
      <div class="box-body">
						<div class="col-md-12 text-center">
                        <div class="col-md-1"> </div>
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <span class="badge badge-success"> 5 </span>
                                <br>Sangat Baik
                            </div>
							
                            <div class="col-md-2"> 
                                <span class="badge badge-primary"> 4 </span>
                                <br>Baik
                            </div>

                            <div class="col-md-2">
                                <span class="badge badge-warning"> 3 </span>
                                <br>Cukup
                            </div>
							<div class="col-md-2">
                                <span class="badge badge-danger"> 2 </span>
                                <br>Kurang
                            </div>
							
                            <div class="col-md-2">
                                <span class="badge badge-secondary"> 1 </span>
                                <br>Sangat Kurang
                            </div>
						</div>
                    </div>
      </div>
                <!-- form start -->
                <br>
					<br>

					<form role="form">
                  		<!-- <div class="col-sm-12">
                  			<a href="/formnilai" class="btn btn-success float-right btn-sm">
							  <i class="fas fa-plus"></i> Beri Nilai 
							</a> <br><br>
                 		 </div> -->
                	</form>
					<form role="form" id="editPenilaian" method="post">
						<div class="row">
								<div class="col-md-3">                                
									<div class="form-group text-center">
										<label for="fname">Nama Mahasiswa</label>
										<!-- <select class="form-control required" id="id_penilaian" name="id_penilaian">
                                            <option value="">Pilih Nama</option>
                                            <option value="2">Nofa</option>
                                            <option value="3">Febi</option>
                                        </select> -->
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Skill</label>
										<!-- <input type="number"  class="form-control required" id="kebersamaan" name="kebersamaan" value="3"> -->
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Kerapihan</label>
										<!-- <input type="number"  class="form-control required" id="sikap" name="sikap" value="4"> -->
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Sikap</label>
										<!-- <input type="number"  class="form-control required" id="sikap" name="sikap" value="4"> -->
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Keaktifan</label>
										<!-- <input type="number"  class="form-control required" id="keaktifan" name="keaktifan" value="5"> -->
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Perhatian</label>
										<!-- <input type="number"  class="form-control required" id="skill" name="skill" value="5"> -->
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Kehadiran</label>
										<!-- <input type="number"  class="form-control required" id="sikap" name="sikap" value="4"> -->
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<label for="fname">Total</label>
									</div>
								</div>
							</div>
              <!-- <p> daftar isi </p>  -->
              <div class="row">
								<div class="col-md-3">                                
									<div class="form-group text-center">
									<input style="text-align:center" type="text" class="form-control required" id="nama_mahasiswa" value="Marsekal Rama">

									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="kebersamaan" name="kebersamaan" value="3">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="keaktifan" name="keaktifan" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="skill" name="skill" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
									<span class="badge badge-success">29 </span>
									</div>
								</div>	
							</div>
				<!-- siswa ke-2 -->
				<div class="row">
								<div class="col-md-3">                                
									<div class="form-group text-center">
									<input style="text-align:center" type="text" class="form-control required" id="nama_mahasiswa" value="Nofa Dwi Adelia">

									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="kebersamaan" name="kebersamaan" value="3">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="keaktifan" name="keaktifan" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="skill" name="skill" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
									<span class="badge badge-success">29 </span>
									</div>
								</div>	
							</div>
			<!-- siswa ke-3 -->
			<div class="row">
								<div class="col-md-3">                                
									<div class="form-group text-center">
									<input style="text-align:center" type="text" class="form-control required" id="nama_mahasiswa" value="Febi Fiolanda">

									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="kebersamaan" name="kebersamaan" value="3">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="keaktifan" name="keaktifan" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="skill" name="skill" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="sikap" value="4">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
									<span class="badge badge-success">29 </span>
									</div>
								</div>	
							</div>

          <div class="row">
            <div class="col-md-12">                                
              <div class="form-group">
                <label for="fname">Keterangan</label>
                <ol>
                  <li><b>Skill</b>     :  Kemampuan dalam menyelesaikan tugas</li>
                  <li><b>Kerapihan</b> :  Berpakaian, Cara kerja, Penampilan</li>
                  <li><b>Sikap</b>     :  Kesopanan, menghormati, menghargai orang lain</li>
                  <li><b>Keaktifan</b> :  Bertanya, mengeluarkan pendapat, tidak malas-malasan</li>
                  <li><b>Perhatian</b> :  Keingintahuan, kepatuhan dalam bimbingan</li>
                  <li><b>Kehadiran</b> :  Kehadiran PKL, efisien waktu</li>
                </ol>
              </div>
            </div>
            </div>
            <div class="float-sm-right">
        <div class="box-footer">
          <a href="#" onclick="goBack()" type="button" class="btn btn-primary" >Kembali</a>
          <input type="submit" class="btn btn-primary pull-right" value="Simpan Nilai" />
        </div>
        </div>
        </div>
      </form>
            </div>
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