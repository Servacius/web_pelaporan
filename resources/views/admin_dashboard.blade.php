@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Beranda')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">error_outline</i>
              </div>
              <h3 class="card-title">Hilang</h3>
              <h3 class="card-title">49</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">warning</i>
              </div>
              <h3 class="card-title">Rusak</h3>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">check_circle_outline</i>
              </div>
              <h3 class="card-title">Temuan</h3>
              <h3 class="card-title">20</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
      </div>
    <br>
      <h4 class="card-title font-weight-bold">Data Terbaru</h4>
      <div class="row">
        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title font-weight-bold">Hilang</h4>
              <p class="card-category">Daftar barang yang hilang</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Slack ID</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                </thead>
                <tbody>
                    @foreach($barangHilang as $barangHilang)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$barangHilang->slack_id}}</td>
                        <td>{{$barangHilang->name}}</td>
                        <td>{{$barangHilang->deskripsi}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
                <div>
                    <a href="{{ route('data-barang-hilang') }}" style="float: right;" class="text-warning font-weight-bold">Read more ....</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title font-weight-bold">Rusak</h4>
              <p class="card-category">Daftar barang yang mengalami kerusakan</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-danger">
                <th>ID</th>
                  <th>Slack ID</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                </thead>
                <tbody>
                    @foreach($barangRusak as $barangrusak)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$barangrusak->slack_id}}</td>
                        <td>{{$barangrusak->name}}</td>
                        <td>{{$barangrusak->deskripsi}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
                <div>
                    <a href="{{ route('data-barang-rusak') }}" style="float: right;" class="text-danger font-weight-bold">Read more ....</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title font-weight-bold">Temuan</h4>
              <p class="card-category">Daftar barang yang ditemukan</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
              <thead class="text-success">
              <th>ID</th>
                  <th>Slack ID</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                </thead>
                <tbody>
                    @foreach($barangTemuan as $barangtemuan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$barangtemuan->slack_id}}</td>
                        <td>{{$barangtemuan->name}}</td>
                        <td>{{$barangtemuan->deskripsi}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
                <div>
                    <a href="{{ route('data-barang-temuan') }}" style="float: right;" class="text-success font-weight-bold">Read more ....</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
