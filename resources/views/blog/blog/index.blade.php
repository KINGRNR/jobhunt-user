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
<div class="loading-spinner-overlay" id="loading-spinner">
    <div class="loading-spinner"></div>
    <p>Loading..</p>

</div>
<section class="bg-white dark:bg-gray-900 mt-6">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog
            </h2>
            <p class="font-light text-red-500 sm:text-xl dark:text-gray-400">Just For Testing a New Feature!., dual database connection, Lazy Load implementation, & Knowing How Social Media Works</p>
        </div>
    </div>
    <div class="mx-auto container">
        <div class="skeleton grid grid-cols-1 lg:grid-cols-3 gap-4">
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
            <article
                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-300 max-w-xl p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="flex animate-pulse">
                    <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="flex animate-pulse">
                    <div class="h-6 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-96"></div>
                    {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
                </div>
                <div class="animate-pulse bg-gray-200 mt-2 mb-5 rounded-lg h-72 w-96"></div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="animate-pulse rounded-full bg-gray-200 h-10 w-10"></div>
                        <div class="flex animate-pulse">
                            <div class="h-4 mt-2 ml-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
                        </div>
                    </div>
                    <div class="flex animate-pulse">
                        <div class="h-4 mt-2 bg-gray-200 rounded-lg dark:bg-gray-700 w-28"></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="content grid grid-cols-1 lg:grid-cols-3 gap-4">

        </div>
    </div>
    <div class="flex">
    <button id="load-more-btn" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Load More</button>
</div>
</section>
@include('blog.blog.javascript')
