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
            
            <div class="card card-primary card-outline">
                <div class="box-header">
                    <h3 class="box-title">Penilaian Mahasiswa Details</h3>
                </div><!-- /.box-header -->
                
      <div class="card-body">
      
        <div class="col-md-12 text-center">
          <div class="row">
            <div class="col-md-2"><span class='label label-success'>5</span><br>Sangat Baik</div>
            <div class="col-md-2"><span class='label label-info'>4</span><br>Baik</div>
            <div class="col-md-2"><span class='label label-warning'>3</span><br>Cukup</div>
            <div class="col-md-2"><span class='label label-danger'>2</span><br>Kurang</div>
            <div class="col-md-2"><span class='label label-default'>1</span><br>Sangat Kurang</div>
        </div>
      </div> 
      </div>
                <!-- form start -->
      <form role="form" id="editPenilaian" action="https://pklkomsi.000webhostapp.com/dosen/penilaian/editPenilaian" method="post">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">                                
              <div class="form-group text-center">
                <label for="fname">Nama Mahasiswa</label>
                <p style="font-size: 35px" ><b>mahasiswa</b></p>
                <input type="hidden" value="3" id="id_penilaian" name="id_penilaian" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">Keaktifan</label>
                <input type="number" min="1" max="5" class="form-control required" id="kebersamaan"  name="kebersamaan" value="3" >
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">Kebersamaan</label>
                <input type="number" min="1" max="5" class="form-control required" id="kebersamaan"  name="kebersamaan" value="3" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">Sikap</label>
                <input type="number" min="1" max="5" class="form-control required" id="sikap"  name="sikap" value="4" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">Keaktifan</label>
                <input type="number" min="1" max="5" class="form-control required" id="keaktifan"  name="keaktifan" value="5" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">Skill</label>
                <input type="number" min="1" max="5" class="form-control required" id="skill"  name="skill" value="5" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">                                
              <div class="form-group">
                <label for="fname">Nilai Total</label>
                <p style="font-size: 30px;" ><strong>1.06</strong></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">                                
              <div class="form-group">
                <label for="fname">Keterangan</label>
                <ol>
                  <li><b>Kebersamaan</b> : Kekompakan, kerja sama, saling pengertian</li>
                  <li><b>Sikap</b> : Kesopanan, menghormati, menghargai orang lain</li>
                  <li><b>Keaktifan</b> : Bertanya, mengeluarkan pendapat, tidak malas-malasan</li>
                  <li><b>SKill</b> : Kemampuan dalam menyelesaikan tugas</li>
                </ol>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        
        <div class="box-footer">
          <a href="#" onclick="goBack()" type="button" class="btn btn-primary" />Kembali</a>
          <input type="submit" class="btn btn-primary pull-right" value="Simpan Nilai" />
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