<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";
    var jobs = [];

    // var  = [];
    const urlParams = new URLSearchParams(window.location.search);
    const key = urlParams.get('key');
    $(() => {
        console.log(key)

        init()
    });
    init = () => {
        // loadPage();
        loaddata();
    }

    loaddata = () => {
        $.ajax({
            url: '/detail-blog',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: key
            },
            dataType: 'json',
            success: function(response) {
                var data = response.data
                $('#id_user').val(data.user.id);
                $('#id_post').val(data.blog.id);
                var content = `
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full object-cover"
                                src="/file/user_photo/${data.user.resume_official_photo}" alt="">
                            <div>
                                <a href="#" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">${data.user.name}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">${data.user.resume_professional_title}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-2 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">${data.blog.title}</h1>
                </header>
                <p class="lead">${data.blog.content}</p>
                <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png"
                        alt="">
                </figure>
                `
                $('.content-blog').append(content);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    postComment = () => {
        var validasi = 'true';
        $(".input-required").each(function(i, obj) {
            let inputValue = $(this).val().trim();

            if (inputValue === "") {
                $(this).removeClass("is-valid").addClass("is-invalid");
                validasi = 'false-invalid';
            } else {
                $(this).removeClass("is-invalid");
                $(this).parent().find(".error_code").removeClass("invalid-feedback").text("").show();
            }
        });
        var data = $('[name="formComment"]')[0];
        var formData = new FormData(data);
        $('.btn-postcom').fadeOut();

        if (validasi === 'true') {
            $('.btn-postcom').fadeIn();
            $.ajax({
                url: APP_URL + 'blog/postCommentSingle',
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function(response) {
                    let err_msg = response.responseJSON
                    Swal.fire({
                        title: err_msg.title,
                        text: err_msg.message,
                        icon: (err_msg.success) ? 'success' : "error",
                        buttonsStyling: false,
                        confirmButtonText: "Oke!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        };
    }


    function checkTextarea() {
        var commentValue = $('#comment').val();

        if (commentValue.trim() === '') {
            $('.btn-postcom').fadeOut();
        } else {
            $('.btn-postcom').fadeIn();
        }
    }
</script>
