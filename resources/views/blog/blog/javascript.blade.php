<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    // var jobs = [];
    $(() => {
        initBlog();
        checkMobileSize();

        $(window).resize(checkMobileSize);
    });
    var loading = false;
    var offset = 0;
    var limit = 6;
    var isMobile = $(window).width() < 768;

    function checkMobileSize() {
        isMobile = $(window).width() < 768;
        if (isMobile) {
            $(window).off('scroll', scrollHandler);
            $('#load-more-btn').show();
        } else {
            $(window).scroll(function() {
                if (!loading && $(window).scrollTop() + $(window).height() == $(document).height()) {
                    $('#loading-spinner').fadeIn();
                    loading = true;

                    initBlog(function() {
                        loading = false;
                        $('#loading-spinner').fadeOut();

                        setTimeout(function() {
                            var currentPosition = $(window).scrollTop();
                            $(window).scrollTop(currentPosition - 100);
                        }, 100);
                    });
                }
                $('#load-more-btn').hide();
            });
            $(window).on('scroll', scrollHandler);
        }
    }

    $('#load-more-btn').on('click', function() {
        if (!loading) {
            $('#loading-spinner').fadeIn();
            loading = true;

            initBlog(function() {
                loading = false;
                $('#loading-spinner').fadeOut();
            });
        }
    });

    initBlog = (callback) => {
        $.ajax({
            url: '/blog-index',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                offset: offset,
                limit: limit
            },
            success: function(response) {
                var data = response.content;
                $('#loading-spinner').fadeOut()
                if (data.length > 0) {
                    $('.skeleton').empty()
                    $.each(data, function(i, v) {
                        content = `
                    <article
                        class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                            <a href="#">${v.title}</a>
                        </h2>
                        <p class="mb-4 text-gray-500 dark:text-gray-400">${v.content.substring(0, 100)}...........</p>
                        <a href="#">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                                class="mb-5 rounded-lg w-full" alt="Image 1">
                        </a>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 object-cover rounded-full"
                                    src="/file/user_photo/${v.user.resume_official_photo}"
                                    alt="Bonnie Green avatar" />
                                <span class="font-medium dark:text-white">
                                    ${v.user.name}
                                </span>
                            </div>
                            <button data-id="${v.id}" onclick="detailBlog(this)"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </article>
                    `;
                        $('.content').append(content);
                    });

                    offset += limit;
                } else {
                    $('#load-more-btn').hide();
                }
                callback();
            },
            error: function(error) {
                callback();

                console.log(error);
            }
        });
    };

    detailBlog = (key) => {
        var urlKey = btoa($(key).attr('data-id'))
        window.location.href = "/content-blog?key=" + urlKey
    }
</script>
