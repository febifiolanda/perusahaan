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
                <p><h2>Periode PKL <strong>2020</strong></h2><i class="text-muted">24 juni 2020</i></p>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <div class="alert alert-success alert-dismissible">
                                <i class="icon fas fa-calendar"></i> Saat ini adalah periode Kerja Praktik.
                                <h3><b>2020</b> - <b>2021</b></h3>
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
                <a href="https://pklkomsi.000webhostapp.com/admin/pendaftaran/pendaftaranListing" class="small-box-footer">Cek Profile <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>4<sup style="font-size: 20px"> Mahasiswa</sup></h3>
                  <p>Sedang Proses <b>PKL</b></p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="https://pklkomsi.000webhostapp.com/admin/pendaftaran/pendaftaranMagangListing" class="small-box-footer">Cek List Mahasiswa <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                  <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>2<sup style="font-size: 20px">Penilaian</sup></h3>
                  <p>Mahasiswa yang sudah dinilai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="https://pklkomsi.000webhostapp.com/admin/user/userListing" class="small-box-footer">Cek List Mahasiswa  <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div>
    </section>
    
 
   

@endsection

@section('scripts')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
@endsection