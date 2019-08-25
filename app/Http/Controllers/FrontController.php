<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Tag;

class FrontController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->get();
        $artikel1 = Artikel::orderBy('created_at', 'desc')->paginate(4);
        $artikel2 = Artikel::inRandomOrder()->paginate(6);
        $tag = Tag::all();

        return view('front.index', compact('artikel', 'artikel1', 'artikel2', 'tag'));
    }
    public function catalog(Request $request)
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(10);
        $artikel1 = Artikel::inRandomOrder()->paginate(6);
        // $cari = $request->cari;

        // if ($cari) {
        //     $artikel = Artikel::where('judul', 'LIKE', "%$cari%")->get();
        // }
        return view('front.catalog2', compact('artikel', 'artikel1'));
    }
    public function detailblog(Artikel $artikel)
    {
        $artikel1 = Artikel::inRandomOrder()->paginate(6);
        return view('front.details1', compact('artikel', 'artikel1'));
    }
}
