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
              <h3 class="card-title">Daftar Lamaran</h3>
            </div>
            <div class="card-body ">
              <table id="table-DaftarLamaran" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>id</th>
                  <th>No</th>
                  <th>Nama Kelompok</th>
                  <th>Tanggal Daftar</th>
                  <th>Lowongan</th>
                  <th>Aksi</th>
                  <th>Status</th>
                  
              
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <td>Trident</td>
                  <td>1</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="detail_kelompok" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                  
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
    tableGroup = $('#table-DaftarLamaran').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-lamaran/') }}",
            type: "GET",
        },
        columns: [
            { data: 'id_pelamar', name:'id_pelamar', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'group.nama_kelompok', name:'group.nama_kelompok', visible:true},
            { data: 'tanggal_daftar', name:'tanggal_daftar', visible:true},
            { data: 'lowongan.pekerjaan', name:'lowongan.pekerjaan', visible:true},
            { data: 'action2', name:'action2', visible:true},
            { data: 'action', name:'action', visible:true},
        ],
      });
  });
</script>

@endsection