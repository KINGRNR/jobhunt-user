<style>
    .loading-spinner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ubah z-index sesuai kebutuhan */
    }

    .loading-spinner {
        border: 2px solid #ccc;
        border-top: 2px solid #007bff;
        /* Ganti warna sesuai kebutuhan */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
{{-- <div class="loading-spinner-overlay" id="loading-spinner">
    <div class="loading-spinner"></div>
    <p>Loading..</p>

</div> --}}
<div id="loadingOverlay" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-white z-10">
    <div class="bg-white p-8 rounded shadow-lg w-96 flex flex-col items-center justify-center relative">
        <img src="/file/logo/user.png" class="img-jobhunt" alt="">
        <h1 class="mt-2 mb-2">Welcome to Our Feed!</h1>
        <div id="progressContainer" class="relative w-full h-2.5 bg-gray-200 rounded overflow-hidden">
            <div id="progressBar" class="absolute top-0 left-0 h-full bg-blue-600 rounded"
                style="width: 0%; transition: width 0.5s ease;"></div>
        </div>
    </div>


</div>
<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center">
        <h2 class="text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Hello Feed
        </h2>
        {{-- <p class="font-light text-red-500 sm:text-xl dark:text-gray-400">Just For Testing a New Feature!., dual
            database connection, Lazy Load implementation, & Knowing How Social Media Works</p> --}}
    </div>
</div>
<section class="bg-gray-100 dark:bg-gray-900 flex flex-col lg:flex-row justify-center">
    <!-- Left Section (Profile Box) -->
    <div class="w-full lg:w-1/4 p-4 side-content">
        <!-- Profile Box Content Goes Here -->
        <!-- For example: -->
        @auth
            <div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 lg:ml-20 ">
                <img class="object-cover w-16 h-16 rounded-full mb-4" src="/file/user_photo/{{ session('user_photo') }}"
                    alt="Profile Image">
                <h3 class="text-xl font-semibold">{{ auth()->user()->name }}</h3>
                <p class="text-gray-500">{{ auth()->user()->email }}</p>
            </div>
            <h3 class="font-semibold mt-5 lg:ml-20">Feed Created By you</h3>

            <div class="list-feed h-96 lg:ml-20 overflow-y-auto">
            </div>
        @else
            <div class="bg-white rounded-lg border border-gray-200 p-4 lg:h-64 ml-20 ">
                {{-- <img class="w-16 h-16 rounded-full mb-4" src="path/to/profile-image.jpg" alt="Profile Image"> --}}
                <h3 class="text-xl font-semibold">Login First</h3>
                {{-- <p class="text-gray-500">Your Bio or other information</p> --}}
                {{-- <a href="/login" class="text-gray-500">Login Here</a> --}}
            </div>
            @endif
        </div>
        <div class="lg:hidden w-full">
            <div class="grid max-w-xs grid-cols-3 gap-1 p-1 mx-auto my-2 bg-gray-100 rounded-lg dark:bg-gray-600"
                role="group">
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">
                    New
                </button>
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-white bg-gray-900 dark:bg-gray-300 dark:text-gray-900 rounded-lg">
                    Popular
                </button>
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg">
                    Following
                </button>
            </div>
        </div>
        <!-- Center Section (Feed) - Scrollable -->
        <div class="overflow-y-auto p-4">
            <div class="mx-auto container">
                <div class="skeleton w-full flex flex-col items-center justify-center">
                    <article
                        class="mb-5 w-full transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 max-w-2xl p-8 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7 object-cover rounded-full"
                                        src="/file/user_photo/${v.user.resume_official_photo}" alt="Bonnie Green avatar" />
                                    <span class="font-medium dark:text-white lg:w-64">
                                        Name
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
                            <a href="#">Judul</a>
                        </h2>
                        <p class="mb-4 text-gray-500 dark:text-gray-400">content Desc</p>
                        <a href="#">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                                class="mb-5 rounded-lg w-full" alt="Image 1">
                        </a>
                        <button type="button"
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
                        <button type="button"
                            class="text-blue-700 border border-gray-200 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_44_3398)">
                                    <path
                                        d="M10.8799 21.94L16.4099 16.4C16.7799 16.03 16.9899 15.52 16.9899 14.99V5C16.9899 3.9 16.0899 3 14.9899 3H5.9999C5.1999 3 4.4799 3.48 4.1699 4.21L0.9099 11.82C0.0598996 13.8 1.5099 16 3.6599 16H9.3099L8.3599 20.58C8.2599 21.08 8.4099 21.59 8.7699 21.95C9.3599 22.53 10.2999 22.53 10.8799 21.94ZM20.9999 3C19.8999 3 18.9999 3.9 18.9999 5V13C18.9999 14.1 19.8999 15 20.9999 15C22.0999 15 22.9999 14.1 22.9999 13V5C22.9999 3.9 22.0999 3 20.9999 3Z"
                                        fill="#323232" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_44_3398">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            {{-- <span
                            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-gray-200 rounded-full">
                            2
                        </span> --}}
                        </button>
                        <button type="button" onclick="showCommentSection()"
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


                    </article>
                    <!-- Repeat the above structure for additional articles -->
                </div>
                <div class="content w-full flex flex-col items-center justify-center">
                    {{-- actual --}}
                </div>
            </div>
        </div>

        <!-- Right Section (Popular Feed) -->
        <div class="hidden lg:w-1/4 lg:p-4 lg:block">
            <!-- Popular Feed Content Goes Here -->
            <!-- For example: -->
            <div class="bg-white rounded-lg border border-gray-200 p-4 h-64 mr-20">
                <h3 class="text-lg font-semibold mb-4">Popular Industry</h3>
                <!-- Add popular feed content here -->
                <!-- This section will not be scrollable -->
            </div>
        </div>
    </section>
    <div
        class="fixed z-auto	 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600 lg:hidden">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">

            <button data-tooltip-target="tooltip-home" type="button" onclick="window.location.href='/'"
                class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span class="sr-only">Home</span>
            </button>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button data-tooltip-target="tooltip-wallet" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                    <path
                        d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                </svg>
                <span class="sr-only">Wallet</span>
            </button>
            <div id="tooltip-wallet" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Wallet
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            @auth
                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-new" type="button" data-modal-target="post-form"
                        data-modal-toggle="post-form"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                        <span class="sr-only">Post</span>
                    </button>
                </div>
                <div id="tooltip-new" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Post Something
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-search" type="button"
                    class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <div id="tooltip-search" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Search
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-profile" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    <span class="sr-only">Profile</span>
                </button>
                <div id="tooltip-profile" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            @else
                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-postlogin" type="button"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-gray-300 rounded-full group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                        <span class="sr-only">Post</span>
                    </button>
                </div>
                <div id="tooltip-postlogin" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    to Post something you need to login
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-search" type="button"
                    class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <div id="tooltip-search" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Search
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-login" type="button" onclick="window.location.href='/login'"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18"
                        fill="none">
                        <path
                            d="M8.3 4.7C7.91 5.09 7.91 5.71 8.3 6.1L10.2 8H1C0.45 8 0 8.45 0 9C0 9.55 0.45 10 1 10H10.2L8.3 11.9C7.91 12.29 7.91 12.91 8.3 13.3C8.69 13.69 9.31 13.69 9.7 13.3L13.29 9.71C13.68 9.32 13.68 8.69 13.29 8.3L9.7 4.7C9.31 4.31 8.69 4.31 8.3 4.7ZM18 16H11C10.45 16 10 16.45 10 17C10 17.55 10.45 18 11 18H18C19.1 18 20 17.1 20 16V2C20 0.9 19.1 0 18 0H11C10.45 0 10 0.45 10 1C10 1.55 10.45 2 11 2H18V16Z"
                            fill="#323232" />
                    </svg>
                    <span class="sr-only">Login</span>
                </button>
                <div id="tooltip-login" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Login
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                @endif
            </div>
        </div>
        <div
            class="hidden fixed bottom-0 z-auto	 w-full -translate-x-1/2 bg-white border-t border-gray-200 left-1/2 dark:bg-gray-700 dark:border-gray-600 lg:block">
            {{-- <div class="w-full">
            <div class="grid max-w-xs grid-cols-3 gap-1 p-1 mx-auto my-2 bg-gray-100 rounded-lg dark:bg-gray-600"
                role="group">
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-white bg-gray-900 dark:bg-gray-300 dark:text-gray-900 rounded-lg">
                    New
                </button>
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg"
                    disabled>
                    Coming Soon
                </button>
                <button type="button"
                    class="px-5 py-1.5 text-xs font-medium text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 rounded-lg"
                    disabled>
                    Coming Soon
                </button>
            </div>
        </div> --}}
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                <button data-tooltip-target="tooltip-home" onclick="window.location.href='/'" type="button"
                    class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </button>
                <div id="tooltip-home" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Home
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-bookmark" type="button"
                    class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path
                            d="M13 20a1 1 0 0 1-.64-.231L7 15.3l-5.36 4.469A1 1 0 0 1 0 19V2a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17a1 1 0 0 1-1 1Z" />
                    </svg>
                    <span class="sr-only">Bookmark</span>
                </button>
                <div id="tooltip-bookmark" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Bookmark
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                @auth
                    <div class="flex items-center justify-center">
                        <button data-tooltip-target="tooltip-new" type="button" data-modal-target="post-form"
                            data-modal-toggle="post-form"
                            class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 1v16M1 9h16" />
                            </svg>
                            <span class="sr-only">Post</span>
                        </button>
                    </div>
                    <div id="tooltip-new" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Post Something
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-search" type="button"
                        class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                    <div id="tooltip-search" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Search
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-profile" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span class="sr-only">Profile</span>
                    </button>
                    <div id="tooltip-profile" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Profile
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                @else
                    <div class="flex items-center justify-center">
                        <button data-tooltip-target="tooltip-postlogin" type="button"
                            class="inline-flex items-center justify-center w-10 h-10 font-medium bg-gray-300 rounded-full group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 1v16M1 9h16" />
                            </svg>
                            <span class="sr-only">Post</span>
                        </button>
                    </div>
                    <div id="tooltip-postlogin" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        to Post something you need to login
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-search" type="button"
                        class="inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                    <div id="tooltip-search" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Search
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button data-tooltip-target="tooltip-login" type="button" onclick="window.location.href='/login'"
                        class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18"
                            fill="none">
                            <path
                                d="M8.3 4.7C7.91 5.09 7.91 5.71 8.3 6.1L10.2 8H1C0.45 8 0 8.45 0 9C0 9.55 0.45 10 1 10H10.2L8.3 11.9C7.91 12.29 7.91 12.91 8.3 13.3C8.69 13.69 9.31 13.69 9.7 13.3L13.29 9.71C13.68 9.32 13.68 8.69 13.29 8.3L9.7 4.7C9.31 4.31 8.69 4.31 8.3 4.7ZM18 16H11C10.45 16 10 16.45 10 17C10 17.55 10.45 18 11 18H18C19.1 18 20 17.1 20 16V2C20 0.9 19.1 0 18 0H11C10.45 0 10 0.45 10 1C10 1.55 10.45 2 11 2H18V16Z"
                                fill="#323232" />
                        </svg>
                        <span class="sr-only">Login</span>
                    </button>
                    <div id="tooltip-login" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Login
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @endif
                </div>
            </div>
            @include('blog.blog.comment')
            @include('blog.blog.form')
            @include('blog.blog.javascript')
