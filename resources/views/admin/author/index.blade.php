@extends('layouts.adminlte')

@section('tittle')
    Data Author
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 text-right">
    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-sm"></i> Tambah Penulis</a>
    </div> 
</div><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Penulis</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="dataTable" class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
         
        </tr>
        </thead>
        <tbody>
            
        </tbody>
      </table>
    </div>
</div>
@endsection
@push('script')
<script>
    $(function () {
      $("#dataTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        serverSide : true,
        processing : true,
        ajax: '{{route('admin.author.data')}}',
        columns : [
            { data: 'id'},
            { data: 'name'}
        ]


      });
    
    });
  </script>
@endpush