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
                <form id="editLowonganForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan *</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{$instansi->pekerjaan}}" maxlength="100">
                            <p class="text-muted"><small><i>*Max 100 karakter</i></small></p>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Persyaratan *</label>
                            <textarea name="persyaratan" id="persyaratan" class="form-control" maxlength="1000">{{$instansi->persyaratan}}</textarea>
                            <p class="text-muted"><small><i>*Max 1000 karakter</i></small></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas *</label>
                            <input type="number" class="form-control" name="kapasitas" id="kapasitas" value="{{$instansi->kapasitas}}" maxlength="2">
                        </div>
                        <div class="form-group">
                          <label>Instansi *</label>
                          <select name="id_instansi" id="id_instansi" class="form-control select2" style="width: 100%;">
                              <option selected="selected">{{$instansi->nama}}</option>
                              <!-- @foreach($instansi as $instansis)
                              <option value="{{ $instansis->id_instansi }}">{{ $instansis->nama }}</option>
                            
                              @endforeach -->
                          </select >
                        </div>
                        <div class="form-group">
                          <label>Periode *</label>
                          <select name="id_periode" class="form-control select2" style="width: 100%;">
                              <option selected="selected" value="{{ $instansi->periode->id_periode }}">{{$instansi->periode->tahun_periode}}</option>
                          </select >
                        </div>
                        <input type="hidden" name="id_lowongan" id="id_lowongan" value="{{ $instansi->id_lowongan }}">
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <div class="d-flex flex-row justify-content-end">
                          <span class="mr-2">
                          <button type="submit" class="btn btn-danger">Cancel</button>
                          </span>
                          <span>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </span>
                      </div>
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
  
  <script>
$(document).ready(function(){   
    $('#editLowonganForm').on('submit', function(e){
        e.preventDefault();
        var id = $('#id_lowongan').val();
        var pekerjaan = $('#pekerjaan').val();
        var persyaratan = $('#persyaratan').val();
        var kapasitas = $('#kapasitas').val();
        var id_instansi = $('#id_instansi').val();
        var id_periode = $('#id_periode').val();
        $.ajax({
            type: "PUT",
            // headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/lowongan/"+id,
            cache:false,
            dataType: "json",
            data: $('#editLowonganForm').serialize(),
            success: function(data){
                window.location = "/lowongan";
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            },
            error: function(error){
            console.log(error);
            }
        });
    });
});
</script>

@endsection