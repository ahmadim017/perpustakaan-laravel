@extends('layouts.materialize')

@section('content')
<div class="container">
    <h2 class="teal-text accent-3"><blockquote><b>Koleksi Buku</b></blockquote></h2>
    <div class="row">
        <form action="" class="col s12">
            <div class="row">
                <div class="input-field">
                <i class="material-icons prefix">search</i>
                  <input id="search" type="email" class="validate">
                  <label for="email">Search</label>
                </div>
              </div>
        </form>   
    </div>  
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
                <input type="submit" value="Pinjam Buku" class="waves-effect waves-light btn btn-small">
                </form>
                </div>
              </div>
        </div>  
        @endforeach   
    </div>
    {{$book->links('vendor.pagination.materialize')}}
</div>
@endsection
@section('script')
@if (session('status'))
<script>
  M.toast({html: '{{ session('status') }}'})
</script>   
@endif
    
@endsection
    
    