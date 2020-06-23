@extends('layouts.materialize')

@section('content')
<div class="container">
  <h4><blockquote>Detail Buku</blockquote></h4>
    <div class="row">
        <div class="col s12 m12">
            <div class="card horizontal hoverable">
                <div class="card-image">
                  <img src="{{$book->getCover()}}">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <h5 class="red-text accent-2">{{$book->tittle}}</h5>
                    <blockquote>{{$book->deskripsi}}</blockquote>
                    <p>
                        <i class="material-icons">person</i><b>{{$book->author->name}}</b>
                    </p>
                    <p>
                        <i class="material-icons">book</i><b>{{$book->qty}}</b>
                    </p>
                  </div>
                  <div class="card-action">
                    <form class="d-inline" action="{{route('pinjam',[$book->id])}}" method="post" >
                      @csrf
                      <input type="submit" value="Pinjam Buku" class="waves-effect right waves-light btn btn-small">
                      </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
<div class="container">
<h5><blockquote>Buku lainnya dari Penulis {{$book->author->name}}</blockquote></h5>
<div class="row">
  @foreach ($book->author->book->shuffle()->take(3) as $b)
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
              <input type="submit" value="Pinjam Buku" class="waves-effect  waves-light btn btn-small">
              </form>
          </div>
        </div>
  </div>  
  @endforeach   
</div>
</div>
@endsection
