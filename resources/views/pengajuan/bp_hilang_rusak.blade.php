@extends('layouts.app', ['activePage' => $activePage, 'titlePage' => __('Buat Pengajuan')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pengajuan.buat_pengajuan') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Buat Pengajuan') }}</h4>
                <p class="card-category">{{ __('Form Buat Pengajuan') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Nama Barang') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nama_pelaporan" id="input-nama-pelaporan" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="nama_pelaporan">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Kategori Barang') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="kategori" class="form-control" required="true" aria-required="true">
                        <option value="">Pilih Kategori Barang</option>
                        @foreach ($kategori as $value)
                            <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Slack ID') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input class="form-control" name="slack_id" id="slack_id" type="text" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Lokasi') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="lokasi" class="form-control" required="true" aria-required="true">
                        <option value="">Pilih Lokasi</option>
                        @foreach ($lokasi as $value)
                            <option value="{{ $value->id }}">{{ $value->nama_lokasi }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Divisi') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="divisi" class="form-control" required="true" aria-required="true">
                        <option value="">Pilih Divisi</option>
                        @foreach ($divisi as $value)
                            <option value="{{ $value->id }}">{{ $value->nama_divisi }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Deskripsi') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <textarea cols="50" rows="5" class="form-control" name="deskripsi" id="input-nama-pelaporan" type="text" required="true" aria-required="true"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Gambar') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group custom-file">
                      <input class="custom-file-input" style="z-index:0; opacity:1;" type="file" name="gambar"  required="true"></input>
                    </div>
                  </div>
                </div>
              <div class="card-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
