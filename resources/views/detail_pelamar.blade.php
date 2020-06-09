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
              <table id="table-detailPelamar" class="table table-bordered table-striped ">
                <thead>
                <tr>
                  <th>id</th>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kemampuan</th>
                  <th>Angkatan</th>
                  <th>CV</th>
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
  (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
// $(function(){    
//     $('.view-pdf').on('click',function(){
//         var pdf_link = $(this).attr('href');
//         var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
//         $.createModal({
//         title:'CV',
//         message: iframe,
//         closeButton:true,
//         scrollable:false
//         });
//         return false;        
//     });    
// })
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script type="text/javascript">
  var tabledetailGroup;
  $(document).ready(function(){
    tabledetailGroup = $('#table-detailPelamar').DataTable({
        processing	: true,
        language: {
                    search: "INPUT",
                    searchPlaceholder: "Search records"
                  },
        // dom 		: "<fl<t>ip>",
  			serverSide	: true,
  			stateSave: true,
        ajax		: {
            url: "{{ url('table/data-detailpelamar',$id_kelompok) }}",
            type: "GET",
        },
        columns: [
            { data: 'id_kelompok_detail', name:'id_kelompok_detail', visible:false},
            { data: 'DT_RowIndex', name:'DT_RowIndex', visible:true},
            { data: 'nama', name:'nama', visible:true},
            { data: 'kemampuan', name:'kemampuan', visible:true},
            { data: 'angkatan', name:'angkatan', visible:true},
            { data: 'action', name:'action', visible:true},
           
        
        ],
      });
  });

  $('body').on('click', '.lihatCV', function lihatCV() {

var cv = $(this).data('id');

// var pdf_link = $(this).attr('href');
        var iframe = '<div class="iframe-container"><iframe src="'+cv+'"></iframe></div>'
        $.createModal({
        title:'CV',
        message: iframe,
        closeButton:true,
        scrollable:false
        });
        return false;  

});
</script>
@endsection
	
