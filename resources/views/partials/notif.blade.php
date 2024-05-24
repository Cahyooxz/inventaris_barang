@if (session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@elseif(session('success-update'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success-update') }}!",
            icon: "success"
        });
    </script>
@elseif(session('success-delete'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success-delete') }}",
            icon: "success"
        });
        </script>
@elseif(session('fail'))
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('fail') }}!",
            icon: "error"
        });
    </script>
@endif