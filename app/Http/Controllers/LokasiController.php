<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = $this->getAllLokasi();
        return view('masterdata/lokasi_list', compact('lokasis'));
    }

    public function getAllLokasi(){
        $lokasi = Lokasi::orderBy('created_at', 'DESC')
                    ->paginate(10);

        return $lokasi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.lokasi_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lokasi::create([
            'nama_lokasi' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = Lokasi::find($id);
        return view('masterdata.lokasi_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Lokasi::find($lokasi->id)->update(['nama_lokasi' => $request->name, 'updated_at' => now()]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
    }
}
