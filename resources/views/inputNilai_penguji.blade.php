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
              <h3 class="card-title">Input Nilai </h3>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Angkatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Marsekal Rama</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="nilai_penguji" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Nofa Adelia </td>
                  <td>2016</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Febi Fiolanda </td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Kelompok 5</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Kelompok 8</td>
                  <td>2016</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Kelompok 7</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Kelompok 6</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Kelompok 9</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Kelompok 10</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Kelompok 11</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Kelompok 12</td>
                  <td>2017</td>
                  <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                </tr>
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
@endsection