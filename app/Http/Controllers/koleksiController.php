<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\book;
use App\borrow;
use App\User;
use Illuminate\Support\Facades\Auth;

class koleksiController extends Controller
{
    public function index()
    {
        $book = book::paginate('12');
        return view('homepage',['book' => $book]);
        
    }

    public function show(book $book)
    {
        return view('showbook',['book' => $book]);
    }

    public function pinjam(book $book)
    {
        $user = Auth()->user();

        if ($user->pinjam()->where('books.id', $book->id)->where('return_at', NULL)->count() > 0) {
            return redirect()->back()->with('status','Anda Sudah Meminjam Buku dengan Judul :'. $book->tittle);
        }
        $user->pinjam()->attach($book);
        $book->decrement('qty');

        return redirect()->route('homepage')->with('status','Berhasil meminjam Buku');
    }

    public function dashboard(book $book)
    {
        $book = auth()->user()->pinjam;
        return view('dashboard',['book' => $book]);
    }
}
