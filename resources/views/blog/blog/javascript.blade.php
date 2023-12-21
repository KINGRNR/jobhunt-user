<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    // var jobs = [];
    $(() => {
        initBlog();
        // checkMobileSize();
        // initUser();
        // $(window).resize(checkMobileSize);
    });

    function initShowAlert() {
        // Check if the alert element already exists
        if ($('#toast-simple').length > 0) {
            return; // If it exists, do nothing
        }
        var svg = [];

        svg = `<div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
        </svg>
        <span class="sr-only">Warning icon</span>
    </div>`
        var alert = `<div id="toast-simple" class="fixed top-20	 right-4 flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-lg text-black bg-white-500 divide-x rtl:divide-x-reverse divide-orange-400 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert" style="z-index: 1000; display: none;">
       ${svg}   
        <div class="ps-2 text-lg font-semibold">Message sent successfully.</div>
    </div>
`;

        // Append the alert and use fadeIn for smooth display
        $('body').append(alert).children('#toast-simple').fadeIn();

        // Set a timeout to remove the alert after 5000 milliseconds (5 seconds)
        setTimeout(function() {
            // Use fadeOut before removing for a smooth transition
            $('#toast-simple').fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }



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
    initUser = () => {
        $.ajax({
            url: "/blog/userindex",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                offset: offset,
                limit: limit
            },
            success: function(response) {
                console.log(response)
                if (response) {
                var user = `<div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 ml-20 ">
            <img class="w-16 h-16 rounded-full mb-4 object-cover" src="file/user_photo/${response.resume_official_photo}" alt="Profile Image">
            <h3 class="text-xl font-semibold">${response.resume_fullname}</h3>
            <p class="text-gray-500">${response.resume_second_email}</p>
            <p class="text-gray-500">${response.resume_professional_title}</p>
        </div>`} else {
            user =  `<div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 ml-20 ">
            <h3 class="text-xl font-semibold">Create Ur Own Resume</h3>
        </div>`
        }
                $('.side-content').append(user);
            },
            error: function(error) {
                callback();

                console.log(error);
            }
        });
    };

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
                console.log(response.id)
                
                var data = response.content;
                console.log(data.reaction)
                $('#loading-spinner').fadeOut()
                if (data.length > 0) {
                    $('.skeleton').empty()

                    $.each(data, function(i, v) {
                        //     content = `
                        // <article
                        //     class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                        //     <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        //         <a href="#">${v.title}</a>
                        //     </h2>
                        //     <p class="mb-4 text-gray-500 dark:text-gray-400">${v.content.substring(0, 100)}...........</p>
                        //     <a href="#">
                        //         <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                        //             class="mb-5 rounded-lg w-full" alt="Image 1">
                        //     </a>
                        //     <div class="flex justify-between items-center">
                        //         <div class="flex items-center space-x-4">
                        //             <img class="w-7 h-7 object-cover rounded-full"
                        //                 src="/file/user_photo/${v.user.resume_official_photo}"
                        //                 alt="Bonnie Green avatar" />
                        //             <span class="font-medium dark:text-white">
                        //                 ${v.user.name}
                        //             </span>
                        //         </div>
                        //         <button data-id="${v.id}" onclick="detailBlog(this)"
                        //             class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        //             Read more
                        //             <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        //                 xmlns="http://www.w3.org/2000/svg">
                        //                 <path fill-rule="evenodd"
                        //                     d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        //                     clip-rule="evenodd"></path>
                        //             </svg>
                        //         </button>
                        //     </div>
                        // </article>
                        // `;
                        var buttonReaction = []
                        var photo = []
                        buttonReaction = `
                        <button type="button" id="like" onclick="postReaction(this)"  data-id="${v.id_feed}" data-like="1"
                        class="text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g clip-path="url(#clip0_44_3401)">
                                <path
                                    d="M13.12 2.06L7.58 7.6C7.21 7.97 7 8.48 7 9.01V19C7 20.1 7.9 21 9 21H18C18.8 21 19.52 20.52 19.84 19.79L23.1 12.18C23.94 10.2 22.49 8 20.34 8H14.69L15.64 3.42C15.74 2.92 15.59 2.41 15.23 2.05C14.64 1.47 13.7 1.47 13.12 2.06ZM3 21C4.1 21 5 20.1 5 19V11C5 9.9 4.1 9 3 9C1.9 9 1 9.9 1 11V19C1 20.1 1.9 21 3 21Z"
                                    fill="#323232" />
                            </g>
                            <defs>
                                <clipPath id="clip0_44_3401">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-gray-200 rounded-full">
                            2
                        </span>
                    </button>
                    <button type="button" id="dislike" onclick="postReaction(this)" data-id="${v.id_feed}" data-like="0"
                        class="text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_44_3398)">
                              <path d="M10.8799 21.94L16.4099 16.4C16.7799 16.03 16.9899 15.52 16.9899 14.99V5C16.9899 3.9 16.0899 3 14.9899 3H5.9999C5.1999 3 4.4799 3.48 4.1699 4.21L0.9099 11.82C0.0598996 13.8 1.5099 16 3.6599 16H9.3099L8.3599 20.58C8.2599 21.08 8.4099 21.59 8.7699 21.95C9.3599 22.53 10.2999 22.53 10.8799 21.94ZM20.9999 3C19.8999 3 18.9999 3.9 18.9999 5V13C18.9999 14.1 19.8999 15 20.9999 15C22.0999 15 22.9999 14.1 22.9999 13V5C22.9999 3.9 22.0999 3 20.9999 3Z" fill="#323232"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_44_3398">
                                <rect width="24" height="24" fill="white"/>
                              </clipPath>
                            </defs>
                          </svg>
                        {{-- <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-gray-200 rounded-full">
                            2
                        </span> --}}
                    </button>`
                        if (v.pic_name) {
                            photo = `<img src="/file/feed/${v.pic_name}"
                            class="mb-5 rounded-lg w-full" alt="Image 1">`
                        } else {
                            photo = `<span>tidak ada photo untuk ditampilkan</span>`
                        }
                        content = ` <article
                    class="mb-5 w-full transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-2xl p-8 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 object-cover rounded-full"
                                    src="/file/user_photo/${v.user.resume_official_photo}" alt="Bonnie Green avatar" />
                                <span class="font-medium dark:text-white lg:w-64">
                                    ${v.user.name}
                                </span>
                            </div>
                        </div>
                        <div class="flex">
                            <button type="button" disabled
                        class="w-36 cursor-not-allowed  text-center justify-center text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                          <span class="text-black">Follow
                    </span>
                    </button>
                        </div>
                    </div>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">${v.title_feed}</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">${v.description_feed}</p>
                    <a href="#">
                        ${photo}
                    </a>
                    ${buttonReaction}
                    <button type="button" disabled
                        class=" cursor-not-allowed text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_44_9609)">
                              <path d="M20 4V17.17L18.83 16H4V4H20ZM20 2H4C2.9 2 2 2.9 2 4V16C2 17.1 2.9 18 4 18H18L22 22V4C22 2.9 21.1 2 20 2ZM18 12H6V14H18V12ZM18 9H6V11H18V9ZM18 6H6V8H18V6Z" fill="#323232"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_44_9609">
                                <rect width="24" height="24" fill="white"/>
                              </clipPath>
                            </defs>
                          </svg>
                          <span class="ml-2 text-black">Comment
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-gray-200 rounded-full">
                            2
                        </span>
                    </span>
                    </button>
                </article>`
                        $('.content').append(content);
                    });

                    offset += limit;
                } else {
                    $('#load-more-btn').hide();
                }
                checkLike(response)
                if(response.id == null){
                    $('#like, #dislike').addClass('cursor-not-allowed');
                } else {
                    $('#like, #dislike').removeClass('cursor-not-allowed');
                }
                callback();
            },
            error: function(error) {
                callback();

                console.log(error);
            }
        });
    };

    function checkLike() {
        $.ajax({
            url: '/blog-index',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {

                if(response.reaction){
                    console.log("true")
                $.each(response.reaction, function(i, v) {
                    var btn = $('[data-id="' + v.id_feed + '"][data-like="' + v
                        .reaction + '"]');
                    btn.attr('data-likeUpdate', '1');
                    btn.addClass('bg-blue-700')
                })
            } else {
                console.log("cek ombak")
                $('#like').attr('[data-user="' + response.id +'"]')
            }
            }
        })
    }

    // function postReaction(a) {


    // }
    detailBlog = (key) => {
        var urlKey = btoa($(key).attr('data-id'))
        window.location.href = "/content-blog?key=" + urlKey
    }


    save = () => {
        var form = "form-feed"
        var data = $('[name="' + form + '"]')[0];
        var formData = new FormData(data);
        quick.ajax({
            url: "/blog/save",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.success) {
                    $('#submit-button').prop('disabled', true).removeClass(
                        'bg-figma-biru-primary, hover:bg-blue-800').addClass('bg-gray-200').css(
                        'cursor', 'progress')
                    quick.toastNotif({
                        title: 'success',
                        icon: 'success',
                        callback: function() {
                            window.location.href = '/blog';
                        }
                    })

                }
            },
        })
    }
    postReaction = (a) => {
        var data = {};
        if ($(a).hasClass('bg-blue-700')) {
            $(a).removeClass('bg-blue-700');
        }
        if ($(a).hasClass('bg-blue-700')) {
            $(a).removeClass('bg-blue-700');
        }
        data['reaction'] = $(a).attr('data-like') || '';
        data['id_user'] = $(a).attr('data-user') || '';
        data['id_feed'] = $(a).attr('data-id') || '';
        data['already_reacted'] = $(a).attr('data-likeUpdate') || '';

        $.ajax({
            url: "/blog/reaction",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: data,
            success: function(res) {
                if (res) {
                    console.log(res.data)
                    if (res.data == "delete") {
                        $(a).removeAttr('data-likeUpdate', '1');
                    } else if (res.data == "update") {
                        $(a).addClass('bg-blue-700')
                        $(a).attr('data-likeUpdate', '1');

                    }
                    // $('#submit-button').prop('disabled', true).removeClass('bg-figma-biru-primary hover:bg-blue-800').addClass('bg-gray-200').css('cursor', 'progress');

                    // Menampilkan notifikasi
                    // quick.toastNotif({
                    //     title: 'success',
                    //     icon: 'success',
                    //     callback: function() {
                    //         window.location.href = '/blog';
                    //     }
                    // });
                }
            },
        });
    }
</script>
