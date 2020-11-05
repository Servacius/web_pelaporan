@extends('layouts.app', ['activePage' => 'p_saatini', 'titlePage' => __('Pengajuan Saat Ini')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title font-weight-bold">Pengajuan Saat Ini</h4>
            <p class="card-category">Daftar pengajuan barang  yang telah dilakukan</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-info">
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
                @foreach($p_saat_ini as $pengajuan_saat_ini)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$pengajuan_saat_ini->slack_id}}
                    </td>
                    <td>
                        {{$pengajuan_saat_ini->pelaporan_name}}
                    </td>
                    <td>
                        {{$pengajuan_saat_ini->status_name}}
                    </td>
                    <td>
                        {{$pengajuan_saat_ini->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ route('pelaporan.edit_pengajuan_saat_ini', ['id' => $pengajuan_saat_ini->pelaporan_id]) }}" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <div style="float: right;">
                {{$p_saat_ini->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
