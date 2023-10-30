
@if(session('success'))
<script>

    $(document).ready(function () {
        Swal.fire({
            title: 'Successfully done',
            text: 'You have done Successfully',
            icon: 'success',
        });
    });
</script>
@endif

@if(session('error'))
<script>
    $(document).ready(function () {
        Swal.fire({
            title: 'Error Occurs!',
            text: 'Something went wrong',
            icon: 'info',
        });
    });
</script>
@endif
