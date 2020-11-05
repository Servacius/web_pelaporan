@extends('layouts.app', ['activePage' => $activePage, 'titlePage' => __('Edit Pengajuan')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pengajuan.edit_pengajuan') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Pengajuan') }}</h4>
                <p class="card-category">{{ __('Form Edit Pengajuan') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Nama Barang') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input hidden value="{{ $data[0]->pelaporan_id }}" name="id_pelaporan"/>
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nama_pelaporan" value="{{ $data[0]->pelaporan_name }}" id="input-nama-pelaporan" type="text" required="true" aria-required="true"/>
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
                        @foreach ($kategori as $value)
                            @if($value->id == $data[0]->kategory_id)
                                <option value="{{ $value->id }}" selected>{{ $value->nama_kategori }}</option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Slack ID') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input class="form-control" value="{{ $data[0]->slack_id }}" name="slack_id" id="slack_id" type="text" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Lokasi') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="lokasi" class="form-control" required="true" aria-required="true">
                        @foreach ($lokasi as $value)
                            @if($value->id == $data[0]->lokasi_id)
                                <option value="{{ $value->id }}" selected>{{ $value->nama_lokasi }}</option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->nama_lokasi }}</option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Divisi') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="divisi" class="form-control" required="true" aria-required="true">
                        @foreach ($divisi as $value)
                            @if($value->id == $data[0]->divisi_id)
                                <option value="{{ $value->id }}" selected>{{ $value->nama_divisi }}</option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->nama_divisi }}</option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Deskripsi') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <textarea cols="50" rows="5" class="form-control" name="deskripsi" id="input-nama-pelaporan" type="text" required="true" aria-required="true">{{ $data[0]->deskripsi }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Gambar') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group custom-file">
                      <input class="custom-file-input" style="z-index:0; opacity:1; " type="file" placeholder="" name="gambar" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-1 col-form-label" style="font-weight:bold;">{{ __('Status') }}</label>
                  <div class="form-group col-sm-4">
                    <select name="status" class="form-control" required="true" aria-required="true">
                        <option value="{{ $data[0]->status_id }}">{{ $data[0]->status_name }}</option>
                        @foreach ($status as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
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
