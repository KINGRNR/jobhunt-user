{{-- <style>
    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        0% {
            opacity: 0;
            transform: translateX(100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-left-category {
        opacity: 0;
        transform: translateX(-100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .animate-right-category {
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .animate-left-category.active {
        opacity: 1;
        transform: translateX(0);
        animation: slideInLeft 0.5s ease-in-out;
    }

    .animate-right-category.active {
        opacity: 1;
        transform: translateX(0);
        animation: slideInRight 0.5s ease-in-out;
    }
</style> --}}

<div id="alert_resume" class="hidden container mx-auto mt-5 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
       Lengkapi profil Anda dengan membuat sebuah <a href="#create_resume" class="font-semibold underline hover:no-underline">resume</a>. Selangkah lebih mudah untuk melamar pekerjaan.</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert_resume" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
  </div>
<p class="m-20 text-center lg:text-start"><span
        class="font-semibold text-gray-900 underline decoration-merah decoration-4 text-3xl">Popular</span><span
        class="font-semibold text-merah text-3xl"> Category</span></p>
<div class="grid gap-4 grid-cols-1 m-10 sm:m-20 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 " id="category_section">
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-left-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/informatika.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Teknologi Informasi
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori1">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="1"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-left-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/ekonomi.jpg" alt="">
            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Ekonomi
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori2">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="2"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-right-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/industri.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Teknik & Industri
            </h3>
            </p>

            <p class="mt-2 text-center text-base text-black" id="kategori3">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="3"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-right-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/seni.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Seni & Sastra
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori4">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="4"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-left-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/study.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Pendidikan
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori5">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="5"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-left-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/travel.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Perhotelan & Travel
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori6">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="6"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-right-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/food.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Food & Beverage
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori7">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="7"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
    <article class="rounded-lg border bg-white p-4 shadow-sm transition hover:shadow-md sm:p-6 animate-right-category">

        <div class="grid grid-cols-1">
            <span class="flex justify-center">
                <img src="/file/job_logo/other.jpg" alt="">

            </span>

            <p>
            <h3 class="mt-4 text-base md:text-xl lg-bigger:text-2xl font-semibold text-center text-gray-900">
                Other
            </h3>
            </p>

            <p class="mt-2 text-center text-black" id="kategori8">
                No job available
            </p>

            <button type="button" onclick="redirectKategori(this)" data-id="8"
                class=" text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center mx-7 my-5 rounded-lg">View
                More</button>
            </a>
        </div>
    </article>
</div>

{{-- <script>
    $(document).scroll(function () {
        const observer = new IntersectionObserver(entries => {
            entries.forEach((entry, index) => {
                setTimeout(() => {
                        entry.target.classList.add('active');
                    }, index * 100); 
            });
        }, { threshold: 0.5 });


        const articles = $('.animate-left-category, .animate-right-category');

        articles.each(function () {
            observer.observe(this);
        });
    });
</script> --}}

@include('landing.javascript')
