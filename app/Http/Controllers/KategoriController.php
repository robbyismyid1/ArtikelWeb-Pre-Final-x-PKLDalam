<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getjson()
    {
        $kategori = Kategori::all();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }
    public function index()
    {
        $kategori = Kategori::all();

        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris'
        ]);

        $cat = new Kategori;

        $cat->nama = $request->nama;
        $cat->slug = str_slug($request->nama);
        $cat->save();

        toastr()->success('Data berhasil ditambah!', "$cat->nama");

        return redirect()->route('kategori.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategoris'
        ]);

        $cat = Kategori::findOrFail($request->id);

        $cat->nama = $request->nama;
        $cat->slug = str_slug($request->nama);
        $cat->save();

        toastr()->warning('Data berhasil diubah!', "$cat->nama");

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cat = Kategori::findOrFail($request->id);
        $old = $cat->nama;
        $cat->delete();

        return redirect()->route('kategori.index');
    }

    // public function index()
    // {
    //     $kategori = Kategori::all();
    //     return view('admin.kategori.index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate(['nama_kategori' => 'required|unique:kategoris']);

    //     $kategori = new Kategori;
    //     $kategori->nama_kategori = $request->nama_kategori;
    //     $kategori->slug = str_slug($request->nama_kategori,'-');
    //     $kategori->save();
    //     toastr()->success('Data berhasil ditambah!', "$kategori->nama_kategori");
    //     $response = [
    //         'success' => true,
    //         'data' => $kategori,
    //         'message' => 'berhasil'
    //     ];
    //     return response()->json($response, 200);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $kategori = Kategori::findOrFail($id);
    //     $old = $kategori->nama_kategori;
    //     $kategori->delete();
    //     toastr()->error('Data Dihapus!', "$old");
    //     $response = [
    //         'success' => true,
    //         'data' => $kategori,
    //         'message' => 'berhasil'
    //     ];
    //     return response()->json($response, 200);
    // }
}
