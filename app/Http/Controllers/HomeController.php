<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PelaporanController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $pelaporan;

    public function __construct()
    {
        $this->middleware('auth');
        $this->pelaporan = new PelaporanController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $barangHilang = $this->pelaporan->getPelaporanByTypeId(1, "home");
        $countBarangHilang = $this->pelaporan->getTotalPelaporanByKategoryId(1);
        $barangTemuan = $this->pelaporan->getPelaporanByTypeId(3, "home");
        $countBarangTemuan = $this->pelaporan->getTotalPelaporanByKategoryId(3);

        return view('dashboard', compact('barangHilang', 'barangTemuan', 'countBarangHilang', 'countBarangTemuan'));
    }

    // admin application dashboard
    public function admin_index()
    {
        $barangHilang = $this->pelaporan->getPelaporanByTypeId(1, "home");
        $countBarangHilang = $this->pelaporan->getTotalPelaporanByKategoryId(1);
        $barangRusak = $this->pelaporan->getPelaporanByTypeId(2, "home");
        $countBarangRusak = $this->pelaporan->getTotalPelaporanByKategoryId(2);
        $barangTemuan = $this->pelaporan->getPelaporanByTypeId(3, "home");
        $countBarangTemuan = $this->pelaporan->getTotalPelaporanByKategoryId(3);

        return view('admin_dashboard', compact('barangRusak', 'barangHilang', 'barangTemuan', 'countBarangHilang', 'countBarangRusak', 'countBarangTemuan'));
    }
}
