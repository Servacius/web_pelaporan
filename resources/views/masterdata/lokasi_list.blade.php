@extends('layouts.app', ['activePage' => 'lokasi', 'titlePage' => __('Lokasi')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title font-weight-bold">Lokasi</h4>
            <p class="card-category">Daftar Lokasi</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <div class="col-12 text-right">
                  <a href="{{ route('lokasi.create') }}" class="btn btn-md btn-primary">Add Lokasi</a>
                </div>
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nama Lokasi
                  </th>
                  <th>
                    Created Date
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                @foreach($lokasis as $lokasi)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$lokasi->nama_lokasi}}
                    </td>
                    <td>
                        {{$lokasi->created_at}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ URL::to('lokasi/' . $lokasi->id . '/edit') }}" data-original-title="" title="">
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
                {{$lokasis->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
