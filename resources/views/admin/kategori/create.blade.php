@extends('layouts.adminlte')

@section('tittle')
    Tambah Kategori
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-8">
      @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Create Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{route('admin.kategori.store')}}">
            @csrf
            <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kategori</label>
                      <div class="col-sm-10">
                      <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror " value="{{old('nama_kategori')}}" id="inputEmail3" placeholder="Kategori">
                      @error('nama_kategori')
                        <span class="help-block">{{$message}}</span>
                      @enderror
                      </div>
                  </div>
            </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="{{route('admin.kategori.index')}}" class="btn btn-default float-right">Cancel</a>
                 </div>
    
            </form>
          </div>
          </div>
        </div>
@endsection