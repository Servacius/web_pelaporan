<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($p_barangHilang);
        return view('pelaporan/barang_hilang', compact('p_barangHilang'));
    }

    public function indexBarangRusak()
    {
        $p_barangRusak = $this->getPelaporanByKategory(2);
        // dd($p_barangHilang);
        return view('pelaporan/barang_rusak', compact('p_barangRusak'));
    }

    public function indexBarangTemuan()
    {
        $p_barangTemuan = $this->getPelaporanByKategory(3);
        // dd($p_barangHilang);
        return view('pelaporan/barang_temuan', compact('p_barangTemuan'));
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
                    ->paginate(5);
        }

        return $pelaporan;
    }

    public function getPelaporanByKategory(int $kategori){
        $pelaporan = DB::table('pelaporan')
                    ->join('status_log', 'pelaporan.id', '=', 'status_log.pelaporan_id')
                    ->join('status', 'status_log.status_id', '=', 'status.id')
                    ->select('pelaporan.id as pelaporan_id', 'pelaporan.name as pelaporan_name', 'pelaporan.slack_id as slack_id', 'pelaporan.deskripsi as deskripsi', 'status.name as status_name', 'status.id as status_id', 'status_log.id as status_log_id')
                    ->where('pelaporan.kategory_id', $kategori)
                    ->get();
        return $pelaporan;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelaporan $pelaporan)
    {
        //
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
