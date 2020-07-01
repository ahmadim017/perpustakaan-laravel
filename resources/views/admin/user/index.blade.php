@extends('layouts.adminlte')

@section('tittle')
Daftar User
@endsection

@section('content')
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
          <th>Email</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($user as $u)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                </tr>
                @endforeach
        </tbody>
      </table>
    </div>
</div>
</div>

<form action="" method="POST" id="deleteform">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class="" style="display :none">
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
      $('button#delete').on('click', function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          Swal.fire({
          title: 'Apakah Anda Yakin Ingin Menghapus Kategori?',
          text: "Apakah Data sudah sesuai",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus'
          }).then((result) => {
          if (result.value) {
            document.getElementById('deleteform').action = href;
            document.getElementById('deleteform').submit();
              Swal.fire(
              'dihapus!',
              'Data Berhasil dihapus.',
              'success'
              )
          }
          })
      })
  </script>
@endpush