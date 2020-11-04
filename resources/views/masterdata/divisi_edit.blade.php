@extends('layouts.app', ['activePage' => 'divisi', 'titlePage' => __('Divisi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('divisi.update', $data) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Divisi') }}</h4>
                <p class="card-category">{{ __('Edit Divisi') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama Divisi') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-divisi" type="text" value="{{ $data->nama_divisi }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-divisi">{{ $errors->first('name') }}</span>
                      @endif
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
