@extends('layouts.app', ['activePage' => $activePages, 'titlePage' => __('Report')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title font-weight-bold">{{ $type }}</h4>
            <p class="card-category">{{ $desc }}</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <div class="col-12 text-right">
                  <a href="{{ route('report.export', ['id' => $reports[0]->kategory_id]) }}" class="btn btn-md btn-primary">Generate Report</a>
                </div>
              <table class="table">
                <thead class=" text-primary">
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
                @foreach($reports as $report)
                  <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$report->slack_id}}
                    </td>
                    <td>
                        {{$report->pelaporan_name}}
                    </td>
                    <td>
                        {{$report->status_name}}
                    </td>
                    <td>
                        {{$report->deskripsi}}
                    </td>
                    <td class="td-actions text-right">
                        @if($report->kategory_id == 3)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_temuan', ['id' => $report->pelaporan_id]) }}" data-original-title="" title="">
                        @elseif($report->kategory_id == 2)
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_rusak', ['id' => $report->pelaporan_id]) }}" data-original-title="" title="">
                        @else
                            <a rel="tooltip" class="btn btn-link" href="{{ route('data_barang.detail_barang_hilang', ['id' => $report->pelaporan_id]) }}" data-original-title="" title="">
                        @endif
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <div style="float: right;">
                {{$reports->links()}}
            </div>
          </div>
        </div>
      </div>
@endsection
