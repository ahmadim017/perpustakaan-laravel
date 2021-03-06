@extends('layouts.adminlte')

@section('tittle')
    Data Penulis
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('admin.author.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-sm"></i> Tambah Penulis</a>
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
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($penulis as $p)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->name}}</td>
                <td>
                  <a href="{{route('admin.author.edit', [$p->id])}}" class="btn btn-primary btn-sm">Edit</a>
                  <button href="{{route('admin.author.destroy', [$p->id])}}" class="btn btn-danger btn-sm" id="delete">Delete</button>
                </td>
                </tr>
            @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();

        var href = $(this).attr('href');
        Swal.fire({
        title: 'Apakah Anda Yakin Ingin Menghapus?',
        text: "Data yang dihapus tidak bisa di kembalikan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            document.getElementById('deleteform').action = href;
            document.getElementById('deleteform').submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
       

    })
</script>
<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush