@extends('layouts.app', ['activePage' => 'baranghilang', 'titlePage' => __('Data barang Hilang')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title font-weight-bold">Hilang</h4>
            <p class="card-category"> Daftar barang yang hilang</p>
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
                </thead>
                <tbody>
                @foreach($p_barangHilang as $baranghilang)
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
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
