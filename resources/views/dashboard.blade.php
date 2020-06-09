@extends('welcome')
@section('content')
<!-- Content Wrapper. Contains page content -->

<section class="content-header">
        <h1>
            <i class="fas fa-tachometer" aria-hidden="true"></i> Dashboard
        </h1>
    </section>
    <section class="content">
    <div class="row">
      <div class="col-md-12 text-center">
      @if (!empty($periode))
                <p><h2>Periode PKL <strong>{{$periode->tahun_periode}}</strong></h2><i class="text-muted">{{$date}}</i></p>
              @else
                <p><h2>Periode KP <strong>tidak aktif</strong></h2></p>
              @endif
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <div class="alert alert-success alert-dismissible">
                            @if (!empty($periode))
                              <i class="icon fas fa-calendar"></i> Saat ini adalah periode KP.
                              <h3><b>{{Carbon\Carbon::parse($periode->tgl_mulai)->translatedFormat('d F Y')}}</b> - <b>{{Carbon\Carbon::parse($periode->tgl_selesai)->translatedFormat('d F Y')}}</b></h3>
                            @else
                            <i class="icon fas fa-calendar"></i> Saat ini tidak ada periode KP yang aktif .
                            @endif
                            </div>
                        </div>
                    </div>
                    <br>
      </div>
    </div>
    <div class="justify-content-center">
        <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><sup style="font-size: 20px"> Profile</sup></h3>
                  <p>Mentor/Pembimbing</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="/profile" class="small-box-footer">Cek Profile <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-6">
              
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner" id="kelompokcount">
                 
                  <!-- <h3>4<sup style="font-size: 20px">Kelompok</sup></h3> -->
                  <p>Sedang Proses <b>PKL</b></p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="/kelompok" class="small-box-footer">Cek daftar kelompok <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-4 col-6">
             
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><sup style="font-size: 20px">Cek Buku Harian</sup></h3>
                  <p>mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="/list_kegiatanHarian" class="small-box-footer">Cek List Buku Harian  <i class="fa fa-arrow-circle-right"></i></a>
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
  
  $(document).ready(function(){
    $.ajax({
      type: 'GET',
      url: '/api/perusahaan/kelompokcount/',
      dataType: 'JSON',
      success: function (response) {
        var kel = "<h3>"+response.kelompok+"<sup style='font-size: 20px'>Kelompok</sup></h3>"+
        "<p></p>";
        $("#kelompokcount").append(kel);
      }
    });
    // $.ajax({
    //   type: 'GET',
    //   url: '/api/perusahaan/usulancount/',
    //   dataType: 'JSON',
    //   success: function (response) {
    //     var usulans = "<h3>"+response.usulan+"</h3>"+
    //     "<p>Usulan yang masuk</p>";
    //     $("#usulancount").append(usulans);
    //   }
    // });
  });
</script>
@endsection