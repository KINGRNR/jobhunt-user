<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    // var jobs = [];
    $(() => {
        init()
        checkMobileSize()
        // initBlog();
        // checkCreatedFeed();
        // initUser();
        // $(window).resize(checkMobileSize);
    });
    init = async () => {
        const loadingContainer = document.getElementById('loadingContainer');
        const progressBar = document.getElementById('progressBar');

        await initBlog();
        setProgressBarWidth(progressBar, 44, null);

        await checkCreatedFeed();
        setProgressBarWidth(progressBar, 66, null);

        setProgressBarWidth(progressBar, 100, 1);
        loadingContainer.style.display = 'none';
    }

    function setProgressBarWidth(progressBar, width, isClosed) {
        let currentWidth = parseFloat(progressBar.style.width) || 0;
        const step = 1;
        const intervalTime = 10;

        const interval = setInterval(() => {
            if (currentWidth >= width) {
                clearInterval(interval);

                setTimeout(() => {
                    if (isClosed == 1) {
                        // $('.img-jobhunt').addClass('animate-ping');
                        $('#loadingOverlay').addClass('animate-ping').fadeOut();
                    }
                }, 500);
            } else {
                currentWidth += step;
                progressBar.style.width = `${currentWidth}%`;
            }
        }, intervalTime);
    }



    function initShowAlert() {
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

                        // setTimeout(function() {
                        //     var currentPosition = $(window).scrollTop();
                        //     $(window).scrollTop(currentPosition - 100);
                        // }, 100);
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
        axios.post("/blog/userindex", {
                _token: '{{ csrf_token() }}',
                offset: offset,
                limit: limit
            })
            .then(function(response) {
                if (response.data) {
                    var user = `<div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 ml-20 ">
                <img class="w-16 h-16 rounded-full mb-4 object-cover" src="file/user_photo/${response.data.resume_official_photo}" alt="Profile Image">
                <h3 class="text-xl font-semibold">${response.data.resume_fullname}</h3>
                <p class="text-gray-500">${response.data.resume_second_email}</p>
                <p class="text-gray-500">${response.data.resume_professional_title}</p>
            </div>`;
                } else {
                    user = `<div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 ml-20 ">
                <h3 class="text-xl font-semibold">Create Ur Own Resume</h3>
            </div>`;
                }
                $('.side-content').append(user);
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    initBlog = (callback) => {
        axios.post('/blog-index', {
                _token: '{{ csrf_token() }}',
                offset: offset,
                limit: limit
            })
            .then(response => {
                var data = response.data.content;
                $('#loading-spinner').fadeOut();

                if (data.length > 0) {
                    $('.skeleton').empty();

                    data.forEach(v => {
                        var buttonReaction = [];
                        var photo = [];
                        buttonReaction = `
                        <button type="button" id="like" onclick="postReaction(this)"  data-id="${v.id_feed}" data-like="1"
                        class="text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="blue">
                            <g clip-path="url(#clip0_44_12176)">
                                <path d="M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z" fill="#323232"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_44_12176">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                        <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-gray-200 rounded-full">
                            2
                        </span>
                    </button>`
                        if (v.pic_name) {
                            photo = `<img src="/file/feed/${v.pic_name}"
                            class="mb-5 rounded-lg w-full" alt="Image 1">`
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
                    <button type="button" onclick="showCommentSection(${v.id_feed})"
                            class="text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_44_9609)">
                                    <path
                                        d="M20 4V17.17L18.83 16H4V4H20ZM20 2H4C2.9 2 2 2.9 2 4V16C2 17.1 2.9 18 4 18H18L22 22V4C22 2.9 21.1 2 20 2ZM18 12H6V14H18V12ZM18 9H6V11H18V9ZM18 6H6V8H18V6Z"
                                        fill="#323232" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_44_9609">
                                        <rect width="24" height="24" fill="white" />
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
                    <section class="not-format comment-section-${v.id_feed}" style="display: none;">
                            <form class="mt-2">
                                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                    <label for="comment" class="sr-only">Your comment</label>
                                    <textarea id="comment" rows="6"
                                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                        placeholder="Write a comment..." required></textarea>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Post comment
                                </button>
                            </form>
                            <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                alt="Michael Gough">Michael Gough</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                                title="February 8th, 2022">Feb. 8, 2022</time></p>
                                    </div>
                                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                          </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownComment1"
                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </footer>
                                <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                                    instruments for the UX designers. The knowledge of the design tools are as important as the
                                    creation of the design strategy.</p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                                          <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                          <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                          </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                            <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                alt="Jese Leos">Jese Leos</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                                title="February 12th, 2022">Feb. 12, 2022</time></p>
                                    </div>
                                    <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                          </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownComment2"
                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </footer>
                                <p>Much appreciated! Glad you liked it ☺️</p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                                          <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                              <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                          </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                            <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                                alt="Bonnie Green">Bonnie Green</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"
                                                title="March 12th, 2022">Mar. 12, 2022</time></p>
                                    </div>
                                    <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                          </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownComment3"
                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </footer>
                                <p>The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                                        <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                          <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                            <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                                alt="Helene Engels">Helene Engels</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"
                                                title="June 23rd, 2022">Jun. 23, 2022</time></p>
                                    </div>
                                    <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                          </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownComment4"
                                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </footer>
                                <p>Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                                        <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                          <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                        </section>
                </article>
                `
                        $('.content').append(content);
                    });

                    offset += limit;
                } else {
                    $('#load-more-btn').hide();
                }
                checkLike(response);

                if (response.data.id == null) {
                    $('#like, #dislike').addClass('cursor-not-allowed').attr('disabled', true);
                } else {
                    $('#like, #dislike').removeClass('cursor-not-allowed').attr('disabled', false);
                }


                $('#submit-btn').addClass('bg-figma-biru-primary, hover:bg-blue-800').removeClass(
                    'bg-gray-200');
                $('.animate-spin').fadeOut();
                callback();
            })
            .catch(error => {
                callback();
                console.error(error);
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

                if (response.reaction) {
                    $.each(response.reaction, function(i, v) {
                        var btn = $('[data-id="' + v.id_feed + '"][data-like="' + v
                            .reaction + '"]');
                        btn.attr('data-likeUpdate', '1');
                        btn.addClass('bg-blue-700')
                    })
                } else {
                    $('#like').attr('[data-user="' + response.id + '"]')
                }
            }
        })
    }
    detailBlog = (key) => {
        var urlKey = btoa($(key).attr('data-id'))
        window.location.href = "/content-blog?key=" + urlKey
    }
    save = () => {
        $('#submit-btn').attr('disabled');
        var form = "form-feed";
        var data = new FormData($('[name="' + form + '"]')[0]);
        $('#submit-btn').prop('disabled', true);

        axios.post("/blog/save", data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    $('.animate-spin').fadeIn();
                    quick.toastNotif({
                        title: 'success',
                        icon: 'success',
                        timer: 500,
                        callback: function() {
                            $('.content').empty();
                            $('input, textarea').val('');
                            $('#submit-btn').prop('disabled', false);
                            initBlog();
                        }
                    });
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    postReaction = (a) => {
        var data = {
            reaction: $(a).attr('data-like') || '',
            id_user: $(a).attr('data-user') || '',
            id_feed: $(a).attr('data-id') || '',
            already_reacted: $(a).attr('data-likeUpdate') || ''
        };
        axios.post("/blog/reaction", data, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(function(response) {
                if (response.data.data) {
                    if (response.data.data == "delete") {
                        $(a).removeAttr('data-likeUpdate', '1');
                        $(a).removeClass('bg-blue-700');
                    } else if (response.data.data == "update" || response.data.data == "new") {
                        $(a).addClass('bg-blue-700');
                        $(a).attr('data-likeUpdate', '1');
                    }
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    checkCreatedFeed = () => {
        axios.post("/blog/urFeed", null, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(function(response) {
                response.data.forEach(function(v) {
                    var photo = v.pic_name ?
                        `<img src="/file/feed/${v.pic_name}" class="mb-5 rounded-lg w-full" alt="Image 1">` :
                        `<span>tidak ada photo untuk ditampilkan</span>`;
                    var createdFeed = `<article class="mb-5 w-full transition ease-in-out delay-150 duration-300 max-w-2xl p-8 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">${v.title_feed}</a>
                </h2>
                <p class="mb-4 text-gray-500 dark:text-gray-400">${v.description_feed}</p>
                <button data-modal-toggle="edit-form" onclick="onDetail(${v.id_feed})">
                   ${photo}
                </button>
            </article>`;
                    $('.list-feed').append(createdFeed);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    function showCommentSection(a) {
        $('.comment-section-' + a).fadeToggle();
    }
    onDetail = (a) => {
        var id = {
            id: a
        };

        axios.post("/blog/onDetail", id, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                }
            })
            .then(function(response) {
                $('#delete_btn').attr('onclick', `deleteFeed(${response.data.id_feed})`);

                $('#id_feed').val(response.data.id_feed);
                $('#update-title').val(response.data.title_feed);
                $('#update-description').val(response.data.description_feed);
                if (response.data && response.data.pic_name) {
                    var img = new Image();
                    img.onload = function() {
                        $('#update-imgPreview').fadeIn().attr('src', img.src);
                        $('.loader').hide();
                    };
                    img.src = APP_URL + 'file/feed/' + response.data.pic_name;
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    saveUpdate = () => {
        var form = "form-updatefeed";
        var data = new FormData($('[name="' + form + '"]')[0]);

        axios.post("/blog/saveUpdate", data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    $('.animate-spin').fadeIn();
                    quick.toastNotif({
                        title: 'success',
                        icon: 'success',
                        timer: 500,
                        callback: function() {
                            $('.content').empty();
                            $('input, textarea').val('');
                            $('#update-imgPreview').attr('src', '');
                            $('#submit_btn').prop('disabled', false);
                            initBlog();
                        }
                    });
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    };

    deleteFeed = (a) => {
        var id = {
            id: a
        };

        axios.post("/blog/deleteFeed", id, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    $('#submit-button').prop('disabled', true).removeClass(
                        'bg-figma-biru-primary hover:bg-blue-800').addClass('bg-gray-200').css('cursor',
                        'progress');
                    quick.toastNotif({
                        title: 'success',
                        icon: 'success',
                        timer: 500,
                        callback: function() {
                            window.location.href = '/blog';
                        }
                    });
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    };
</script>
