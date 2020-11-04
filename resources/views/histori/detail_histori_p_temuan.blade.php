@extends('layouts.app', ['activePage' => 'h_barangtemuan', 'titlePage' => __('Histori Barang Temuan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title font-weight-bold">Histori Barang Temuan</h4>
            <p class="card-category"> Daftar histori pelaporan yang ditemukan</p>
          </div>
          <div class="card-body">
            <div class="card mb-12" style="max-width: 1800px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="https://images4.fanpop.com/image/photos/22500000/Angry-Birds-Meet-s-SpongeBob-Patrick-happy-square-sponge-22529634-600-463.jpg" class="card-img rounded img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-2">
                        <div class="card-body">
                            <p class="card-text">Nama Barang</p>
                            <p class="card-text">Nama pelaporan</p>
                            <p class="card-text">Slack ID</p>
                            <p class="card-text">Tanggal</p>
                            <p class="card-text">Deskripsi</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <p class="card-text">: {{$detailPelaporan[0]->pelaporan_name}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->first_name}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->slack_id}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->date}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title font-weight-bold">Status Log</h4>
            <p class="card-category">Detail log Status</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-success">
                  <th>
                    ID
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Tanggal
                  </th>
                </thead>
                <tbody>
                @foreach($statusLog as $log)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$log->status_name}}
                    </td>
                    <td>
                        {{$log->tanggal}}
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
@endsection
