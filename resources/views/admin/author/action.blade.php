<a href="{{route('admin.author.edit', $model)}}" class="btn btn-primary btn-sm">Edit</a>
<button href="{{route('admin.author.destroy', $model)}}" class="btn btn-danger btn-sm" id="delete">Delete</button>
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