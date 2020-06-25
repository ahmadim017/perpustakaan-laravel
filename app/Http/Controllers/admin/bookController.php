<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\book;
use App\author;
use illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = \App\author::all();
        return view('admin.book.create',['penulis' => $penulis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tittle' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'author_id' => 'required',
            'cover' => 'file|image',
            'qty' => 'required|numeric'
        ]);

        $cover = null;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('cover','public');
        }
        book::create([
            'tittle' => $request->tittle,
            'deskripsi' => $request->deskripsi,
            'author_id' => $request->author_id,
            'cover' => $cover,
            'qty' => $request->qty
        ]);
        return redirect()->route('admin.book.create')->with('status','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $penulis = \App\author::all();
        return view('admin.book.edit',['book' => $book,'penulis' => $penulis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $this->validate($request, [
            'tittle' => 'required|min:3',
            'deskripsi' => 'required|min:10',
            'author_id' => 'required',
            'cover' => 'file|image',
            'qty' => 'required|numeric'
        ]);

        $cover = $book->cover;
        if ($request->hasFile('cover')) {
            \Storage::delete($book->cover);
            $cover = $request->file('cover')->store('cover','public');
        }
        $book->update([
            'tittle' => $request->tittle,
            'deskripsi' => $request->deskripsi,
            'author_id' => $request->author_id,
            'cover' => $cover,
            'qty' => $request->qty
        ]);
        return redirect()->route('admin.book.create')->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('admin.book.index')->with('Status','Data Berhasil dihapus');
    }

    public function showData()
    {
        $book = book::orderBy('tittle','ASC')->get();
        $book->load('author');

        return DataTables()->of($book)
       ->addColumn('author', function(book $model){
           return $model->author->name;
       })
       ->editColumn('cover', function(book $model){
           return '<img src="'. $model->getCover() .'" height ="150px"> ';
       })
       ->addColumn('action', 'admin.book.action')
       ->rawColumns(['author','cover','action'])
       ->toJson();
    }
}
