@extends('layouts.app', ['activePage' => 'barangtemuan', 'titlePage' => __('Detail Barang Temuan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title font-weight-bold">Detail Barang Temuan</h4>
            <p class="card-category"> Detail barang yang ditemukan</p>
          </div>
          <div class="card-body">
            <div class="card mb-12" style="max-width: 1800px;">
                <div class="row no-gutters">
                    <div class="col-md-3">
                    <img src="{{asset('/images/'.basename($detailPelaporan[0]->image_path)) }}" width="340" class="rounded img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-2">
                        <div class="card-body">
                            <p class="card-text">Nama Barang</p>
                            <p class="card-text">Nama Pelapor</p>
                            <p class="card-text">Status Barang</p>
                            <p class="card-text">Slack ID</p>
                            <p class="card-text">Tanggal</p>
                            <p class="card-text">Deskripsi</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <p class="card-text">: {{$detailPelaporan[0]->pelaporan_name}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->first_name}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->status_name}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->slack_id}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->date}}</p>
                            <p class="card-text">: {{$detailPelaporan[0]->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="mb-12" style="max-width: 1800px;">
                <h3 class="card-title font-weight-bold">Komentar</h3>
                <br/>
                    @foreach($comment as $comments)
                        <div class="row no-gutters">
                            <div class="col-md-1">
                                <img src="{{asset('/images/dummy_prof.jpeg') }}" class="rounded-circle img-thumbnail img-responsive" width="70" />
                            </div>
                            <div class="row col-md-10">
                                <div class="col-md-6">
                                    <p class="card-text" style="font-weight:bold;">{{ $comments->user_name }}</p>
                                </div>
                                <div class="col-md-4">
                                    <span>{{ \Carbon\Carbon::parse($comments->tanggal)->diffForHumans() }}</span>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text">{{ $comments->comment }}</p>
                                </div>
                            </div>
                        </div>
                        <br/>
                    @endforeach
                    <form method="post" action="{{ route('pelaporan.add_komentar') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <br/><br/><br/>
                    <div class="row no-gutters">
                            <div class="col-xs-2 col-md-12">
                                <div class="form-group">
                                <input hidden value="{{ $detailPelaporan[0]->pelaporan_id }}" name="id_pelaporan"/>
                                <textarea cols="100" rows="5" class="form-control rounded-0" name="comment" id="comment" type="text" required="true" placeholder="Ketik Komentar......"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-12">
                                <button type="submit" class="btn btn-md btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
