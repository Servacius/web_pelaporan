<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_report_hilang()
    {
        $type = "Report Barang Hilang";
        $desc = "Semua daftar pelaporan barang hilang";
        $activePages = "r_baranghilang";
        $reports = $this->getReportByKategoriId(1);

        return view('report/report_list', compact('reports', 'type', 'desc', 'activePages'));
    }

    public function index_report_rusak()
    {
        $type = "Report Barang Rusak";
        $desc = "Semua daftar pelaporan barang rusak";
        $activePages = "r_barangrusak";
        $reports = $this->getReportByKategoriId(2);

        return view('report/report_list', compact('reports', 'type', 'desc', 'activePages'));
    }

    public function index_report_temuan()
    {
        $type = "Report Barang Temuan";
        $desc = "Semua daftar pelaporan barang temuan";
        $activePages = "r_barangtemuan";
        $reports = $this->getReportByKategoriId(3);

        return view('report/report_list', compact('reports', 'type', 'desc', 'activePages'));
    }

    public function getReportByKategoriId(int $id){
        $report = DB::table('pelaporan')
                    ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                    ->join('status', 'status_log.status_id', '=', 'status.id')
                    ->select('pelaporan.id as pelaporan_id', 'pelaporan.name as pelaporan_name', 'pelaporan.slack_id as slack_id', 'pelaporan.deskripsi as deskripsi', 'status.name as status_name', 'status.id as status_id', 'pelaporan.kategory_id')
                    ->where('pelaporan.kategory_id', $id)
                    ->orderBy('pelaporan.created_at', 'DESC')
                    ->simplePaginate(15);
        return $report;
    }

    public function export(int $kategoryId)
    {
        $data = DB::table('pelaporan')
                ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                ->join('status', 'status_log.status_id', '=', 'status.id')
                ->join('kategory_pelaporan', 'pelaporan.kategory_id', '=', 'kategory_pelaporan.id')
                ->join('users', 'pelaporan.user_id', '=', 'users.id')
                ->select(
                    'pelaporan.id as pelaporan_id',
                    'pelaporan.name as pelaporan_name',
                    'pelaporan.slack_id as slack_id',
                    'pelaporan.deskripsi as deskripsi',
                    'status.name as status_name',
                    'status.id as status_id',
                    'users.first_name as first_name',
                    'users.email as email',
                    'kategory_pelaporan.nama_kategori as nama_kategori')
                ->where('pelaporan.kategory_id', $kategoryId)
                ->orderBy('pelaporan.created_at', 'DESC')
                ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellvalue('A1', 'Pelaporan ID');
        $sheet->setCellvalue('B1', 'Nama Pelaporan');
        $sheet->setCellvalue('C1', 'Nama Pelapor');
        $sheet->setCellvalue('D1', 'Slack ID');
        $sheet->setCellvalue('E1', 'Email');
        $sheet->setCellvalue('F1', 'Deskripsi');
        $sheet->setCellvalue('G1', 'Status');
        $sheet->setCellvalue('H1', 'Kategori Pelaporan');

        $rowStart = 2;
        foreach($data as $dataExcel){
            $sheet->setCellValue('A'. $rowStart, $dataExcel->pelaporan_id);
            $sheet->setCellValue('B'. $rowStart, $dataExcel->pelaporan_name);
            $sheet->setCellValue('C'. $rowStart, $dataExcel->first_name);
            $sheet->setCellValue('D'. $rowStart, $dataExcel->slack_id);
            $sheet->setCellValue('E'. $rowStart, $dataExcel->email);
            $sheet->setCellValue('F'. $rowStart, $dataExcel->deskripsi);
            $sheet->setCellValue('G'. $rowStart, $dataExcel->status_name);
            $sheet->setCellValue('H'. $rowStart, $dataExcel->nama_kategori);
            $rowStart++;
        }

        // dd($kategoryId);
        if($kategoryId == 1){
            $filename = "Report_Pelaporan_Hilang.".'xlsx';
        }else if($kategoryId == 2){
            $filename = "Report_Pelaporan_Rusak.".'xlsx';
        }else{
            $filename = "Report_Pelaporan_Temuan.".'xlsx';
        }

        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="'.$filename.'"');

        $writer->save('php://output');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
