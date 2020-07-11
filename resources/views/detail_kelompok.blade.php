@extends('welcome')
@section('content')
<section class="content-header">
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Mahasiswa</h3>
            </div>
            <div class="card-body ">
              <table id="table-detailGroup" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>id</th>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nim</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kemampuan</th>
                  <th>Pengalaman</th>
                  <th>Angkatan</th>
                </tr>
                </thead>
                <tbody>
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
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script> -->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  var tabledetailGroup;
  $(document).ready(function(){
    tabledetailGroup = $('#table-detailGroup').DataTable({
        processing	: true,
        language: {
                    search: "Search",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-detailGroup',$id_kelompok) }}",
            type: "GET",
        },
        columns: [
            { data: 'id_kelompok_detail', name:'id_kelompok_detail', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'mahasiswa.foto', name: 'mahasiswa.foto',
                    render: function( data, type, full, meta ) {
                        return "<img src="+ data +" height=\"50\"/>";
                    }
                },
            { data: 'mahasiswa.nim', name:'mahasiswa.nim', visible:true},
            { data: 'mahasiswa.nama', name:'mahasiswa.nama', visible:true},
            { data: 'mahasiswa.kemampuan', name:'mahasiswa.kemampuan', visible:true},
            { data: 'mahasiswa.pengalaman', name:'mahasiswa.pengalaman', visible:true},
            { data: 'mahasiswa.angkatan', name:'mahasiswa.angkatan', visible:true},
           
        
        ],
      });
  });
</script>
@endsection
	
