@extends('layouts.app', ['activePage' => 'h_baranghilang', 'titlePage' => __('Histori Barang Hilang')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title font-weight-bold">Histori Barang Hilang</h4>
            <p class="card-category"> Daftar histori pelaporan yang hilang</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-warning">
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
                @foreach($h_barangHilang as $baranghilang)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$baranghilang->slack_id}}
                    </td>
                    <td>
                        {{$baranghilang->pelaporan_name}}
                    </td>
                    <td>
                        {{$baranghilang->status_name}}
                    </td>
                    <td>
                        {{$baranghilang->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ route('histori.edit_pengajuan_hilang', ['id' => $baranghilang->pelaporan_id]) }}" data-original-title="" title="">
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
                {{$h_barangHilang->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
