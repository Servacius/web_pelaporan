@extends('layouts.app', ['activePage' => 'barangtemuan', 'titlePage' => __('Data barang Temuan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title font-weight-bold">Ditemukan</h4>
            <p class="card-category"> Daftar barang yang ditemukan</p>
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
                @foreach($p_barangTemuan as $barangtemuan)
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
                        <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_temuan', ['id' => $barangtemuan->pelaporan_id]) }}" data-original-title="" title="">
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                        @if(Auth::user()->account_type_id == 1)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('pelaporan.edit_pengajuan_saat_ini', ['id' => $barangtemuan->pelaporan_id]) }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                            </a>
                        @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div style="float: right;">
                {{$p_barangTemuan->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
