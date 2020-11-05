<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBarangHilang()
    {
        $p_barangHilang = $this->getPelaporanByKategory(1);

        return view('pelaporan/barang_hilang', compact('p_barangHilang'));
    }

    public function indexBarangRusak()
    {
        $p_barangRusak = $this->getPelaporanByKategory(2);

        return view('pelaporan/barang_rusak', compact('p_barangRusak'));
    }

    public function indexBarangTemuan()
    {
        $p_barangTemuan = $this->getPelaporanByKategory(3);

        return view('pelaporan/barang_temuan', compact('p_barangTemuan'));
    }

    public function indexHistoriHilang()
    {
        $userid = Auth::user()->id;
        $h_barangHilang = $this->getPelaporanByUserId(1, $userid);

        return view('histori/histori_p_hilang', compact('h_barangHilang'));
    }

    public function indexHistoriRusak()
    {
        $userid = Auth::user()->id;
        $h_barangRusak = $this->getPelaporanByUserId(2, $userid);

        return view('histori/histori_p_rusak', compact('h_barangRusak'));
    }

    public function indexHistoriTemuan()
    {
        $userid = Auth::user()->id;
        $h_barangTemuan = $this->getPelaporanByUserId(3, $userid);

        return view('histori/histori_p_temuan', compact('h_barangTemuan'));
    }

    public function indexPelaporanSaatIni(){
        $userid = Auth::user()->id;
        $p_saat_ini = $this->getPelaporanByUserId(4, $userid);

        return view('pengajuan/pengajuan_saat_ini', compact('p_saat_ini'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buatPengajuanBarangHilang()
    {
        $activePage = "bp_baranghilang";
        $type = "buat";
        $kategori = DB::table('kategory_pelaporan')
                    ->get();
        $lokasi = DB::table('lokasi')
                    ->get();
        $divisi = DB::table('divisi')
                    ->get();
        return view('pengajuan/bp_hilang_rusak', compact('kategori', 'lokasi', 'divisi', 'activePage', 'type'));
    }

    public function buatPengajuanBarangRusak()
    {
        $activePage = "bp_barangrusak";
        $type = "buat";
        $kategori = DB::table('kategory_pelaporan')
                    ->get();
        $lokasi = DB::table('lokasi')
                    ->get();
        $divisi = DB::table('divisi')
                    ->get();
        return view('pengajuan/bp_hilang_rusak', compact('kategori', 'lokasi', 'divisi', 'activePage', 'type'));
    }

    public function buatPengajuanBarangTemuan()
    {
        $activePage = "bp_barangtemuan";
        $type = "buat";
        $kategori = DB::table('kategory_pelaporan')
                    ->get();
        $lokasi = DB::table('lokasi')
                    ->get();
        $divisi = DB::table('divisi')
                    ->get();
        return view('pengajuan/bp_temuan', compact('kategori', 'lokasi', 'divisi', 'activePage', 'type'));
    }

    public function buatPengajuan(Request $request)
    {
        $userid = Auth::user()->id;
        $imageName = now().'.'.$request->gambar->extension();
        $request->file('gambar')->move(public_path('images'), $imageName);
        $path = public_path('images').'/'.$imageName;

        if($request->kategori == 3){
            $lokasi = null;
            $divisi = null;
        }else{
            $lokasi = $request->lokasi;
            $divisi = $request->divisi;
        }
        $id = DB::table('pelaporan')->insertGetId(
            [
                'user_id' => $userid,
                'kategory_id' => $request->kategori,
                'lokasi_id' => $lokasi,
                'divisi_id' => $divisi,
                'name' => $request->nama_pelaporan,
                'slack_id' => $request->slack_id,
                'deskripsi' => $request->deskripsi,
                'image_path' => $path,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('status_log')->insert(
            [
                'status_id' => 1,
                'pelaporan_id' => $id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        return $this->indexPelaporanSaatIni();
    }

    public function updatePengajuan(Request $request)
    {
        $userid = Auth::user()->id;

        if($request->kategori == 3){
            $lokasi = null;
            $divisi = null;
        }else{
            $lokasi = $request->lokasi;
            $divisi = $request->divisi;
        }
// dd($request);
        if ($request->hasFile('gambar')) {
            // Do something with the file
            $imageName = now().'.'.$request->gambar->extension();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $path = public_path('images').'/'.$imageName;

            $id = DB::table('pelaporan')
            ->where('id', $request->id_pelaporan)
            ->update(
                [
                    'user_id' => $userid,
                    'kategory_id' => $request->kategori,
                    'lokasi_id' => $lokasi,
                    'divisi_id' => $divisi,
                    'name' => $request->nama_pelaporan,
                    'slack_id' => $request->slack_id,
                    'deskripsi' => $request->deskripsi,
                    'image_path' => $path,
                    'updated_at' => now()
                ]
            );
        }else {
            $id = DB::table('pelaporan')
            ->where('id', $request->id_pelaporan)
            ->update([
                    'user_id' => $userid,
                    'kategory_id' => $request->kategori,
                    'lokasi_id' => $lokasi,
                    'divisi_id' => $divisi,
                    'name' => $request->nama_pelaporan,
                    'slack_id' => $request->slack_id,
                    'deskripsi' => $request->deskripsi,
                    'updated_at' => now()
                ]
            );
        }
        // dd($id);
        DB::table('status_log')->insert(
            [
                'status_id' => $request->status,
                'pelaporan_id' => $request->id_pelaporan,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        return $this->indexPelaporanSaatIni();
    }

    public function editPengajuanSaatIni (int $pelaporanId){

        $kategori = DB::table('kategory_pelaporan')->get();
        $lokasi = DB::table('lokasi')->get();
        $divisi = DB::table('divisi')->get();
        $type = "edit";
        $activePage = "p_saatini";
        $kategori_id = DB::table('pelaporan')->select('kategory_id')->where('pelaporan.id', $pelaporanId)->first();

        if($kategori_id->kategory_id == 3){
            $data = DB::table('pelaporan')
                ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                ->join('status', 'status_log.status_id', '=', 'status.id')
                ->join('users', 'pelaporan.user_id', '=', 'users.id')
                ->join('kategory_pelaporan', 'pelaporan.kategory_id', '=', 'kategory_pelaporan.id')
                ->select(
                    'pelaporan.id as pelaporan_id',
                    'pelaporan.name as pelaporan_name',
                    'pelaporan.slack_id as slack_id',
                    'pelaporan.deskripsi as deskripsi',
                    'pelaporan.image_path as image_path',
                    'status.name as status_name',
                    'status.id as status_id',
                    'users.first_name as first_name',
                    'users.email as email',
                    'pelaporan.kategory_id as kategory_id',
                    'kategory_pelaporan.nama_kategori as nama_kategori')
                ->where('pelaporan.id', $pelaporanId)
                ->get();
        }else {
            $data = DB::table('pelaporan')
                ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                ->join('status', 'status_log.status_id', '=', 'status.id')
                ->join('users', 'pelaporan.user_id', '=', 'users.id')
                ->join('kategory_pelaporan', 'pelaporan.kategory_id', '=', 'kategory_pelaporan.id')
                ->join('lokasi', 'pelaporan.lokasi_id', '=', 'lokasi.id')
                ->join('divisi', 'pelaporan.divisi_id', '=', 'divisi.id')
                ->select(
                    'pelaporan.id as pelaporan_id',
                    'pelaporan.name as pelaporan_name',
                    'pelaporan.slack_id as slack_id',
                    'pelaporan.deskripsi as deskripsi',
                    'pelaporan.image_path as image_path',
                    'status.name as status_name',
                    'status.id as status_id',
                    'users.first_name as first_name',
                    'users.email as email',
                    'pelaporan.kategory_id as kategory_id',
                    'kategory_pelaporan.nama_kategori as nama_kategori',
                    'pelaporan.lokasi_id as lokasi_id',
                    'pelaporan.lokasi_id as lokasi_id',
                    'lokasi.nama_lokasi as nama_lokasi',
                    'pelaporan.divisi_id as divisi_id',
                    'divisi.nama_divisi as nama_divisi')
                ->where('pelaporan.id', $pelaporanId)
                ->get();
        }

        $status = DB::table('status')->where('kategory_id', $kategori_id->kategory_id)->get();
        $filename = basename($data[0]->image_path);
        // dd($filename);
        if($kategori_id->kategory_id == 3){
            return view('pengajuan/ep_temuan', compact('kategori', 'lokasi', 'divisi', 'activePage', 'status', 'data', 'type', 'filename'));
        }else {
            return view('pengajuan/ep_hilang_rusak', compact('kategori', 'lokasi', 'divisi', 'activePage', 'status', 'data', 'type', 'filename'));
        }
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
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function getPelaporanByTypeId(int $kategoryid, string $type)
    {
        if($type == "home"){
            $pelaporan = Pelaporan::where('kategory_id', $kategoryid)
                    ->orderBy('created_at', 'DESC')
                    ->take(10)
                    ->get();
        }else {
            $pelaporan = Pelaporan::where('kategory_id', $kategoryid)
                    ->orderBy('created_at', 'DESC')
                    ->simplePaginate(5);
        }

        return $pelaporan;
    }

    public function getPelaporanByKategory(int $kategori){
        $pelaporan = DB::table('pelaporan')
                    ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                    ->join('status', 'status_log.status_id', '=', 'status.id')
                    ->select('pelaporan.id as pelaporan_id',
                            'pelaporan.name as pelaporan_name',
                            'pelaporan.slack_id as slack_id',
                            'pelaporan.deskripsi as deskripsi',
                            'status.name as status_name',
                            'status.id as status_id')
                    ->where('pelaporan.kategory_id', $kategori)
                    ->orderBy('pelaporan.created_at', 'DESC')
                    ->simplePaginate(5);
        return $pelaporan;
    }

    public function getPelaporanByUserId(int $kategoryid, int $userid)
    {
        if($kategoryid == 4){
            $pelaporan = DB::table('pelaporan')
                    ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                    ->join('status', 'status_log.status_id', '=', 'status.id')
                    ->select('pelaporan.id as pelaporan_id',
                            'pelaporan.name as pelaporan_name',
                            'pelaporan.slack_id as slack_id',
                            'pelaporan.deskripsi as deskripsi',
                            'status.name as status_name',
                            'status.id as status_id',
                            'pelaporan.kategory_id as kategory_id')
                    ->where('pelaporan.user_id', $userid)
                    ->where('status_log.status_id', '!=', 4)
                    ->orderBy('pelaporan.created_at', 'DESC')
                    ->simplePaginate(15);
        }else {
            $pelaporan = DB::table('pelaporan')
                    ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                    ->join('status', 'status_log.status_id', '=', 'status.id')
                    ->select('pelaporan.id as pelaporan_id',
                            'pelaporan.name as pelaporan_name',
                            'pelaporan.slack_id as slack_id',
                            'pelaporan.deskripsi as deskripsi',
                            'status.name as status_name',
                            'status.id as status_id',
                            'pelaporan.kategory_id as kategory_id')
                    ->where('pelaporan.kategory_id', $kategoryid)
                    ->where('pelaporan.user_id', $userid)
                    ->orderBy('pelaporan.created_at', 'DESC')
                    ->simplePaginate(15);
        }

        return $pelaporan;
    }

    public function editPengajuanHilang(int $pelaporanId)
    {
        $username = Auth::user()->first_name;
        $detailPelaporan = $this->getDetailData($pelaporanId, 1);
        $statusLog = $this->getStatusLog($pelaporanId);

        return view('histori/detail_histori_p_hilang', compact('username', 'detailPelaporan', 'statusLog'));
    }

    public function editPengajuanRusak(int $pelaporanId)
    {
        $username = Auth::user()->first_name;
        $detailPelaporan = $this->getDetailData($pelaporanId, 2);
        $statusLog = $this->getStatusLog($pelaporanId);

        return view('histori/detail_histori_p_rusak', compact('username', 'detailPelaporan', 'statusLog'));
    }

    public function editPengajuanTemuan(int $pelaporanId)
    {
        $username = Auth::user()->first_name;
        $detailPelaporan = $this->getDetailData($pelaporanId, 3);
        $statusLog = $this->getStatusLog($pelaporanId);

        return view('histori/detail_histori_p_temuan', compact('username', 'detailPelaporan', 'statusLog'));
    }

    public function getDetailData(int $pelaporanId, int $type){
        if($type == 1 || $type == 2){
            $data = DB::table('pelaporan')
                ->join(DB::raw('(select status_log.pelaporan_id, max(status_log.status_id) as status_id from status_log group by status_log.pelaporan_id) as status_log'), 'pelaporan.id', '=', 'status_log.pelaporan_id')
                ->join('status', 'status_log.status_id', '=', 'status.id')
                ->join('kategory_pelaporan', 'pelaporan.kategory_id', '=', 'kategory_pelaporan.id')
                ->join('users', 'pelaporan.user_id', '=', 'users.id')
                ->join('lokasi', 'pelaporan.lokasi_id', '=', 'lokasi.id')
                ->join('divisi', 'pelaporan.divisi_id', '=', 'divisi.id')
                ->select(
                    'pelaporan.id as pelaporan_id',
                    'pelaporan.name as pelaporan_name',
                    'pelaporan.slack_id as slack_id',
                    'pelaporan.deskripsi as deskripsi',
                    'pelaporan.image_path as image_path',
                    'status.name as status_name',
                    'status.id as status_id',
                    'users.first_name as first_name',
                    'users.email as email',
                    'divisi.nama_divisi as nama_divisi',
                    'lokasi.nama_lokasi as nama_lokasi',
                    'kategory_pelaporan.nama_kategori as nama_kategori',
                    'pelaporan.created_at as date')
                ->where('pelaporan.id', $pelaporanId)
                ->orderBy('pelaporan.created_at', 'DESC')
                ->get();
        }else {
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
                    'pelaporan.image_path as image_path',
                    'status.name as status_name',
                    'status.id as status_id',
                    'users.first_name as first_name',
                    'users.email as email',
                    'kategory_pelaporan.nama_kategori as nama_kategori',
                    'pelaporan.created_at as date')
                ->where('pelaporan.id', $pelaporanId)
                ->orderBy('pelaporan.created_at', 'DESC')
                ->get();
        }

        return $data;
    }

    public function getStatusLog(int $pelaporanId){
        $data = DB::table('status_log')
            ->join('status', 'status_log.status_id', '=', 'status.id')
            ->select(
                'status_log.id as status_log_id',
                'status.id as status_id',
                'status.name as status_name',
                'status_log.created_at as tanggal')
            ->where('status_log.pelaporan_id', $pelaporanId)
            ->orderBy('status_log.created_at', 'DESC')
            ->get();

        return $data;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelaporan $pelaporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelaporan $pelaporan)
    {
        //
    }
}
