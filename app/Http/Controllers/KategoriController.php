<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = $this->getAllKategori();
        return view('masterdata/kategori_list', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.kategori_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Kategori::create([
            'nama_kategori' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil di tambahkan.');
    }

    public function getAllKategori(){
        $kategori = Kategori::orderBy('created_at', 'DESC')
                    ->paginate(10);

        return $kategori;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = Kategori::find($id);
        return view('masterdata.kategori_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, Kategori $kategori)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Kategori::find($kategori->id)->update(['nama_kategori' => $request->name, 'updated_at' => now()]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
