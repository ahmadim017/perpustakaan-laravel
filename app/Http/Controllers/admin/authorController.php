<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\author;

class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = author::all();
        return view('admin.author.index',['penulis' => $penulis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required|min:3'
        ]);
        $penulis = new author;
        $penulis->name = $request->get('name');
        $penulis->save();

        return redirect()->route('admin.author.create')->with('status','Data Berhasil disimpan');
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
    public function edit(author $author)
    {
        return view('admin.author.edit',['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, author $author)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
       $author->update($request->only('name'));
       return redirect()->route('admin.author.index')->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author->delete();
        return redirect()->route('admin.author.index')->with('Status','Data Berhasil dihapus');
    }

    public function showData()
    {
        return DataTables()->of(author::orderBy('id','DESC'))
        ->addColumn('action', 'admin.author.action')
        ->addIndexColumn()
        ->rawColumns(['action'])->toJson();
    }
}
