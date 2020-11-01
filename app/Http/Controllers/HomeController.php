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
        $barangTemuan = $this->pelaporan->getPelaporanByTypeId(3, "home");

        return view('dashboard', compact('barangHilang', 'barangTemuan'));
    }

    // admin application dashboard
    public function admin_index()
    {
        $barangHilang = $this->pelaporan->getPelaporanByTypeId(1, "home");
        $barangRusak = $this->pelaporan->getPelaporanByTypeId(2, "home");
        $barangTemuan = $this->pelaporan->getPelaporanByTypeId(3, "home");
        // dd($barangTemuan);
        return view('admin_dashboard', compact('barangRusak', 'barangHilang', 'barangTemuan'));
    }
}
