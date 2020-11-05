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
                    Kategori Barang
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
                        @if($pengajuan_saat_ini->kategory_id == 1)
                            Hilang
                        @elseif($pengajuan_saat_ini->kategory_id == 2)
                            Rusak
                        @else
                            Temuan
                        @endif
                    </td>
                    <td>
                        {{$pengajuan_saat_ini->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        @if($pengajuan_saat_ini->kategory_id == 1)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_hilang', ['id' => $pengajuan_saat_ini->pelaporan_id]) }}" data-original-title="" title="">
                        @elseif($pengajuan_saat_ini->kategory_id == 2)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_rusak', ['id' => $pengajuan_saat_ini->pelaporan_id]) }}" data-original-title="" title="">
                        @else
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_temuan', ['id' => $pengajuan_saat_ini->pelaporan_id]) }}" data-original-title="" title="">
                        @endif
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
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
