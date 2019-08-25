<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Tag;
use App\Rilis;
use App\Negara;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(5);
        $count = Artikel::all();
        $cari = $request->cari;

        if ($cari) {
            $artikel = Artikel::where('judul', 'LIKE', "%$cari%")->paginate(5);
        }

        return view('admin.artikel.index', compact('artikel', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::all();
        $cat = Kategori::all();
        $year = Rilis::all();
        $negara = Negara::all();

        return view('admin.artikel.create', compact('tag', 'cat', 'year', 'negara'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required|unique:artikels',
        //     'konten' => 'required|min:50',
        //     'foto' => 'required|mimes:jpeg.jpg.png.gif|required|max:2048',
        //     'kategori' => 'required',
        //     'tag' => 'required'
        // ]);

        $artikel = new Artikel;

        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul);
        $artikel->konten = $request->konten;
        $artikel->embed = $request->embed;
        $artikel->rating = $request->rating;
        $artikel->durasi = $request->durasi;
        $artikel->user_id = Auth::user()->id;
        $artikel->kategori_id = $request->kategori;
        $artikel->rilis_id = $request->rilis;
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/artikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->attach($request->tag);
        $artikel->negara()->attach($request->negara);
        //
        toastr()->success('Data artikel berhasil dismpan!');

        return redirect()->route('artikel.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $cat = Kategori::all();
        $tag = Tag::all();
        $negara = Negara::all();
        $rilis = Rilis::all();
        $select = $artikel->tag->pluck('id')->toArray();
        $select2 = $artikel->negara->pluck('id')->toArray();

        return view('admin.artikel.edit', compact('artikel', 'cat', 'tag', 'negara', 'rilis', 'select', 'select2' ));
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
        // $request->validate([
        //     'judul' => 'required',
        //     'konten' => 'required|min:50',
        //     'foto' => 'mimes:jpeg.jpg.png.gif|max:2048',
        //     'kategori' => 'required',
        //     'tag' => 'required'
        // ]);

        $artikel = Artikel::findOrFail($id);

        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul);
        $artikel->konten = $request->konten;
        $artikel->embed = $request->embed;
        $artikel->rating = $request->rating;
        $artikel->durasi = $request->durasi;
        $artikel->user_id = Auth::user()->id;
        $artikel->kategori_id = $request->kategori;
        $artikel->rilis_id = $request->rilis;
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/artikel/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $upload = $file->move($path, $filename);

            if ($artikel->foto) {
                $old_foto = $artikel->foto;
                $filepath = public_path() . '/assets/img/artikel/' . $artikel->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    //Exception $e;
                }
            }
            $artikel->foto = $filename;
        }
         
        $artikel->save();
        $artikel->tag()->sync($request->tag);
        $artikel->negara()->sync($request->negara);

        toastr()->success('Data artikel berhasil diubah!');

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->foto) {
            $old_foto = $artikel->foto;
            $filepath = public_path() . '/assets/img/artikel/' . $artikel->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                //Exception $e;
            }
        }

        $artikel->tag()->detach($artikel->id);
        $artikel->negara()->detach($artikel->id);
        $artikel->delete();

        toastr()->error('Data artikel berhasil dihapus!');

        return redirect()->route('artikel.index');
    }
}
