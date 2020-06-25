<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\borrow;
use App\User;
use App\book;
use Carbon\Carbon;

class bukuController extends Controller
{
    public function index()
    {
        $pinjam = borrow::where('return_at',NULL)->get();
        $pinjam->load('user','book');
        return view('admin.buku.index',['pinjam'=> $pinjam]);
    }

    public function pengembalian(Request $request, borrow $borrow)
    {
        $borrow->update([
            'return_at' => Carbon::now(),
            'admin_id' => auth()->user()->id
        ]);
        $borrow->book()->increment('qty');
        
        return redirect()->back()->with('status','Pengembalian buku sukses');
    }
}
