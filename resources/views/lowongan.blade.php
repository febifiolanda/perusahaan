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
              <h3 class="card-title">Manajemen Lowongan</h3>
            </div>
            <div class="card-body ">
                <div class="col-sm-12">
                  <a href="/add_lowongan" class="btn btn-success float-right btn-sm"><i class="fas fa-plus"></i> Tambah Lowongan</a> <br><br>
                </div>
              <table id="table-lowongan" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>id</th>
                  <th>No</th>
                  <th>Nama Lowongan</th>
                  <th>Detail Info</th>
                  <th>Batas Maksimal</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <td>Android developer</td>
                  <td>BackEnd</td>
                  <td>2</td>
                  <td>GMF</td>
                  <td>2020-2021</td>
                  
                </tr> -->
                </tbody>
              </table>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

<script>
  var tableGroup;
  $(document).ready(function(){
    tableGroup = $('#table-lowongan').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-daftarlowongan') }}",
            type: "GET",
        },
        columns: [
            { data: 'id_lowongan', name:'id_lowongan', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'pekerjaan', name:'pekerjaan', visible:true},
            { data: 'persyaratan', name:'persyaratan', visible:true},
            { data: 'kapasitas', name:'kapasitas', visible:true},
            // { data: 'action', name:'action', visible:true},
        ],
      });
  });
</script>

@endsection