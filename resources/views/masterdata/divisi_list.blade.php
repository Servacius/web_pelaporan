@extends('layouts.app', ['activePage' => 'divisi', 'titlePage' => __('Divisi')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title font-weight-bold">Divisi</h4>
            <p class="card-category">Daftar Divisi yang ada</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <div class="col-12 text-right">
                  <a href="{{ route('divisi.create') }}" class="btn btn-md btn-primary">Add Divisi</a>
                </div>
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nama Divisi
                  </th>
                  <th>
                    Created Date
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                @foreach($divisis as $divisi)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$divisi->nama_divisi}}
                    </td>
                    <td>
                        {{$divisi->created_at}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ URL::to('divisi/' . $divisi->id . '/edit') }}" data-original-title="" title="">
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
                {{$divisis->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
