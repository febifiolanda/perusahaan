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
                    <h3 class="box-title">Penilaian Mahasiswa Kerja Praktik</h3>
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
					<form role="form" id="editPenilaian" >
					@csrf
					<input  type="hidden" name="id_kelompok_penilai" value="2">
					<input  type="hidden" name="id_mahasiswa" value=" {{ Request::segment(2) }}">
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
								
							</div>
			<!-- siswa ke-1 -->
			<div class="row">
								<div class="col-md-3">                                
									<div class="form-group text-center" id="form-penilaian">
									<input style="text-align:center" class="form-control required" id="nama_mahasiswa" value="{{$mahasiswa->nama}}">

									</div>
								</div>
								
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="skill" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="1">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="Kerapihan" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="5">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="sikap" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="4">
									</div>
								</div>
							
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="keaktifan" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="2">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="perhatian" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="6">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group text-center">
										<input style="text-align:center" type="text" min="1" max="5" class="form-control required" id="kehadiran" name="nilai[]" value="">
										<input style="text-align:center" type="hidden" name="id_aspek_penilaian[]" value="7">
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
          <input type="submit" class="btn btn-primary pull-right" id="submit" value="Simpan Nilai" />
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
<script type="text/javascript">
// $(document).ready(function(){    
//     $(".tambahbtn").on('click', function(){
//         $('#modal-lg').modal('show');
//         $tr = $(this).closest('tr');
//         var data = $tr.children("td").map(function(){
//           return $(this).text();
//         }).get();
//         console.log(data);
//         // $('#id_dosen').val(data[2]);
//     });
  $('#editPenilaian').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
        // headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        url: "/api/InputNilai",
        cache:false,
        dataType: "json",
        data: $(this).serialize(),
        success: function(data){
            console.log(data);
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
            location.reload();
        },
        error: function(error){
          console.log(error);
        }
    });
  });
</script>

@endsection