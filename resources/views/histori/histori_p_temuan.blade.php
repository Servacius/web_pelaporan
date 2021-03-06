@extends('layouts.app', ['activePage' => 'h_barangtemuan', 'titlePage' => __('Histori Barang Temuan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title font-weight-bold">Histori Barang Temuan</h4>
            <p class="card-category"> Daftar histori barang temuan</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-success">
                  <th>
                    ID
                  </th>
                  <th>
                    Slack ID
                  </th>
                  <th>
                    Nama Barang
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                @foreach($h_barangTemuan as $barangtemuan)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$barangtemuan->slack_id}}
                    </td>
                    <td>
                        {{$barangtemuan->pelaporan_name}}
                    </td>
                    <td>
                        {{$barangtemuan->status_name}}
                    </td>
                    <td>
                        {{$barangtemuan->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ route('histori.edit_pengajuan_temuan', ['id' => $barangtemuan->pelaporan_id]) }}" data-original-title="" title="">
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div style="float: right;">
                {{$h_barangTemuan->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
