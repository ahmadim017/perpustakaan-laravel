@extends('layouts.adminlte')

@section('tittle')
    Tambah Buku
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
      <h3 class="card-title">Tambah Buku</h3>
    </div>
    
    <form class="form-horizontal" method="POST" action="{{route('admin.book.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Buku</label>
          <div class="col-sm-10">
          <input type="text" name="tittle" class="form-control @error('tittle') is-invalid @enderror " value="{{old('tittle')}}" id="inputEmail3" placeholder="Judul Buku">
          @error('tittle')
            <span class="help-block">{{$message}}</span>
          @enderror
          </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi">{{old('deskripsi')}}</textarea>
            @error('deskripsi')
              <span class="help-block">{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penulis</label>
            <div class="col-sm-6">
            <select name="author_id" id="penulis" class="form-control select2 @error('author_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($penulis as $p)
                <option value="{{old('author_id')}} {{$p->id}}">{{$p->name}}</option>
                @endforeach
            </select>
            @error('author_id')
              <span class="help-block">{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cover</label>
            <div class="col-sm-10">
            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror " value="{{old('cover')}}">
            <small class="text-muted">file type jpeg,jpg,png max:5m</small>
            @error('cover')
              <span class="help-block">{{$message}}</span>
            @enderror
            </div>
          </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Buku</label>
            <div class="col-sm-4">
            <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror " value="{{old('qty')}}" id="inputEmail3" placeholder="Jumlah Buku">
            @error('qty')
              <span class="help-block">{{$message}}</span>
            @enderror
            </div>
          </div>
      </div>
      <!-- /.card-footer -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{route('admin.book.index')}}" class="btn btn-default float-right">Cancel</a>
          </div>

        </form>
      </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('public/asset/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2({
        placeholder: 'Select Penulis',
        allowClear : true
    });
</script>
@endpush