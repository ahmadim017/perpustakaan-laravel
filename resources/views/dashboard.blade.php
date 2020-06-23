@extends('layouts.materialize')

@section('content')
    <div class="container">
        <h4><blockquote>Daftar Buku yang Dipinjam</blockquote></h4>
        <div class="row">
            @foreach ($book as $b)
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                      <a href="{{(route('showbook', [$b->id]))}}"><img src="{{$b->getCover()}}" height="400px"></a>
                      <span class="card-title"><b>{{Str::limit($b->tittle, 25)}}</b></span>
                    </div>
                    <div class="card-content">
                      <p>{{Str::limit($b->deskripsi, 60)}}</p>
                    </div>
                    <div class="card-action">
                    <form class="d-inline" action="{{route('pinjam',[$b->id])}}" method="post" >
                    @csrf
                    <input type="submit" value="Kembalikan Buku" class="waves-effect waves-light btn btn-small">
                    </form>
                    </div>
                  </div>
            </div>  
            @endforeach   
        </div>
    </div>
@endsection