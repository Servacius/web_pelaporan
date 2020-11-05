@extends('layouts.app', ['activePage' => 'barangrusak', 'titlePage' => __('Data Barang Rusak')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title font-weight-bold">Rusak</h4>
            <p class="card-category"> Daftar Barang yang mengalami kerusakan</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-danger">
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
                @foreach($p_barangRusak as $barangrusak)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$barangrusak->slack_id}}
                    </td>
                    <td>
                        {{$barangrusak->pelaporan_name}}
                    </td>
                    <td>
                        {{$barangrusak->status_name}}
                    </td>
                    <td>
                        {{$barangrusak->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_rusak', ['id' => $barangrusak->pelaporan_id]) }}" data-original-title="" title="">
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                        @if(Auth::user()->account_type_id == 1)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('pelaporan.edit_pengajuan_saat_ini', ['id' => $barangrusak->pelaporan_id]) }}" data-original-title="" title="">
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
                {{$p_barangRusak->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
