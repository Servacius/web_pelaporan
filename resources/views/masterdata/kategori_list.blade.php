@extends('layouts.app', ['activePage' => 'kategoribarang', 'titlePage' => __('Kategori Barang')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title font-weight-bold">Kategori Barang</h4>
            <p class="card-category">Daftar Kategori Barang</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <div class="col-12 text-right">
                  <a href="{{ route('kategori.create') }}" class="btn btn-md btn-primary">Add Kategori</a>
                </div>
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nama Kategori
                  </th>
                  <th>
                    Created Date
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                @foreach($kategoris as $kategori)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$kategori->nama_kategori}}
                    </td>
                    <td>
                        {{$kategori->created_at}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-link" href="{{ URL::to('kategori/' . $kategori->id . '/edit') }}" data-original-title="" title="">
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
                {{$kategoris->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
