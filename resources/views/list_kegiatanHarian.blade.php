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
              <h3 class="card-title">Buku Harian </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form">
                  <div class="col-sm-4">
                  <p>Saring berdasarkan</p>
                      <!-- select -->
                      <div class="form-group">
                          <select class="form-control form-control-sm">
                            <option>Periode PKL</option>
                            <option>Angkatan</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-default">Filter</button> <br><br>
                </form>
              </div>
              <table id="table-bukuharian" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Angkatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <td>1</td>
                  <td>Dear nasyita</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="/List_kegiatan" class="btn btn-info"><i class="fas fa-list"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Febi Fiolanda </td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="/List_kegiatan" class="btn btn-info"><i class="fas fa-list"></i></a>
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
    tableGroup = $('#table-bukuharian').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-bukuharian-mahasiswa') }}",
            type: "GET",
        },
        columns: [
            { data: 'id_mahasiswa', name:'id_mahasiswa', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'mahasiswa.nama', name:'mahasiswa.nama', visible:true},
            { data: 'mahasiswa.angkatan', name:'mahasiswa.angkatan', visible:true},
            { data: 'status_keanggotaan', name:'status_keanggotaan', visible:true},
            { data: 'action', name:'action', visible:true},
        ],
      });
  });
</script>
@endsection