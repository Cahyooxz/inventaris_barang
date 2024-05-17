@if (session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil ditambahkan!",
            icon: "success"
        });
    </script>
@elseif(session('success-update'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil diperbarui!",
            icon: "success"
        });
    </script>
@elseif(session('success-delete'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil dihapus!",
            icon: "success"
        });
    </script>
@endif