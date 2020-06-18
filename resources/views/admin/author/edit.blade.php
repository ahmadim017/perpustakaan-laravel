@extends('layouts.adminlte')

@section('tittle')
    Edit Penulis
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-8">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Edit Penulis</h3>
        </div>
        
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{route('admin.author.update', $author)}}">
            @csrf
            @method("PUT")
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penulis</label>
              <div class="col-sm-10">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $author->name}}" id="inputEmail3" placeholder="Penulis">
              @error('name')
                <span class="help-block">{{$message}}</span>
              @enderror
            </div>
            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{route('admin.author.index')}}" class="btn btn-default float-right">Cancel</a>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          </div>
        </div>
    </div>
@endsection