@extends('layouts.adminlte')

@section('tittle')
    Daftar Buku
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('admin.book.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-sm"></i> Tambah Buku</a>
    </div> 
</div><br>
@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('Status'))
        <div class="alert alert-danger" role="alert">
            {{ session('Status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
<div class="card">
    

    <!-- /.card-header -->
    <div class="card-body">
      <table id="dataTable" class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Penulis</th>
          <th>Judul Buku</th>
          <th>Deskripsi</th>
          <th>Cover Buku</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            
        </tbody>
      </table>
    </div>
</div>
</div>

<form  action="" class="d-inline" method="POST" id="deleteform">
  @csrf
  @method("DELETE")
  <input type="submit" value="DELETE" style="display :none">
  </form>

@endsection

@push('style')
<link rel="stylesheet" href="{{asset('public/asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('script')
<!-- DataTables -->
<script src="{{asset('public/asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
      $('#dataTable').DataTable({
        responsive : true,
        autoWidth  : false,
        serverSide : true,
        processing : true,
        ajax: '{{route('admin.book.data')}}',
        columns : [
            { data: 'id'},
            { data: 'author'},
            { data: 'tittle'},
            { data: 'deskripsi'},
            { data: 'cover'},
            { data: 'qty'},
            { data: 'action'}
            
        ],
        "columnDefs": [
   
      { "width": "5%", "targets": 1 },
      { visible: false, "targets": 0 }
  ]
      });
    });
  </script>
@endpush