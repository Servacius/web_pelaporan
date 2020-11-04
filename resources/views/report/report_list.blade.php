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
