<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisis = $this->getAllDivisi();
        return view('masterdata/divisi_list', compact('divisis'));
    }

    public function getAllDivisi(){
        $divisi = Divisi::orderBy('created_at', 'DESC')
                    ->paginate(10);

        return $divisi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.divisi_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Divisi::create([
            'nama_divisi' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil di tambahkan.');
    }

    public function getAllKategori(){
        $kategori = Kategori::orderBy('created_at', 'DESC')
                    ->paginate(10);

        return $kategori;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = Divisi::find($id);
        return view('masterdata.divisi_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Divisi::find($divisi->id)->update(['nama_divisi' => $request->name, 'updated_at' => now()]);

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
