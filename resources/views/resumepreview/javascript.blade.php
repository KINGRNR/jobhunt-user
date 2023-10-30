<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var jobs = [];
    $(() => {
        initResume();
    });
    initResume = () => {
        $.ajax({
            url: '/resumeprev',
            type: 'GET',
            success: function(response) {
                console.log(response.resume);
                if (response.resume == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sepertinya anda belum membuat resume!',
                        confirmButtonText: 'Buat Sekarang',
                        showCancelButton: true,
                        cancelButtonText: 'Batal',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/resume';
                        } else if (result.isDismissed) {
                            window.history.back();
                        }
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
