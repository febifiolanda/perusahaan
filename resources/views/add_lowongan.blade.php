@extends('welcome')
@section('content')
  
<section class="content-header">
    </section>
    <section class="content">
    @if (Session::has('alert-success'))
              <div class="col-md-3 alert alert-success">
                  <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
              </div>
                <!-- @alert(['type' => 'success'])
                    {!! session('success') !!}
                @endalert -->
            @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Lowongan</h3>
            </div>
            <!-- /.card-header -->
                <form id="tambahlowongan" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lowongan *</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Detail Info *</label>
                            <textarea name="persyaratan" class="textarea" id="persyaratan" placeholder="Masukan detail info disini"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Batas Maksimal</label>
                            <input  name="kapasitas" type="number" min="1" max="5" id="kapasitas" class="form-control" id="kapasitas" placeholder="kapasitas">
                            <p><i>*Kapasitas max 5</i></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slot</label>
                            <input name="slot" type="number" min="1" max="5"  id="slot" class="form-control" id="slot" placeholder="slot">
                            <p><i>*Slot max 5</i></p>
                       </div>
                        <div class="form-group">
                          <label>Periode *</label>
                          <select name="id_periode" class="form-control select2" style="width: 100%;">
                              <option value="{{ $periode->id_periode }}">{{ $periode->tahun_periode }}</option>
                          </select >
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">periode</label>
                            <input name="id_periode" type="text" class="form-control" id="id_periode" placeholder=""> -->
                            <input name="id_instansi" type="hidden" class="form-control" id="id_instansi" placeholder="" value="{{ $instansi->id_instansi }}">
                            <input name="isDeleted" type="hidden" class="form-control" id="isDeleted" placeholder="" value="0">
                            <input name="created_by" type="hidden" class="form-control" id="created_by" placeholder="" value="{{ $instansi->id_users }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


  @endsection
  @section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  
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
  $('#tambahlowongan').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
        // headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        url: "/api/lowongan",
        cache:false,
        dataType: "json",
        data: $('#tambahlowongan').serialize(),
        success: function(data){
          console.log(data);
            window.location.reload();
            window.location = "/lowongan";
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        },
        error: function(xhr, status, error) 
            {
              $.each(xhr.responseJSON.errors, function (key, item) 
              {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.error(item);
              });
            }
    });
  });
</script>

@endsection