<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\book;
use App\author;
use App\borrow;
use App\User;
use Illuminate\Support\Facades\DB;

class dashController extends Controller
{
    public function index()
    {
        $book = book::count();
        $author = author::count();
        $borrow = borrow::where('return_at',null)->count();
        $kembali = borrow::whereNotNull('return_at')->count();
        $buku =  DB::table('books')->join('authors','books.author_id','=','authors.id')
        ->select('authors.name', DB::raw('count(*) as total, name'))->groupBy('authors.name')->inRandomOrder()->take(10)->get();
        $penulis = [];
        $total = [];
        foreach ($buku as $k) {
            $penulis[] = $k->name;
            $total[] = $k->total;
        } 
        $kategori = DB::table('books')->join('kategori','books.kategori_id','=','kategori.id')
        ->select('kategori.nama_kategori',DB::raw('count(*) as totalkategori, nama_kategori'))
        ->where('nama_kategori','<>',1)->groupBy('nama_kategori')->get();
        $datakategori = [];

        foreach ($kategori as $k){
            $datakategori[] = [$k->nama_kategori,$k->totalkategori];
        }
        //dd($datakategori);
        return view('admin.dashboard.index',['book' => $book,'author' => $author,'borrow' => $borrow,'kembali' => $kembali,'penulis' => $penulis,'total' => $total,'datakategori' => $datakategori]);
    }
}
