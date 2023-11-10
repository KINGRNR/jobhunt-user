<div class="container mx-auto border rounded-lg">
    <div class="flex justify-between">
        <p class="mx-5 my-5 font-semibold text-xl">Company Profile</p>
        <button id="dropdownProfileButton"
            class="hidden text-white focus:ring-4 focus:outline-ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-1 text-center  lg:inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 border border-gray-400 relative "
            style="background-color: #1B61AD;" type="button"><svg class="" style=""
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_2115_2158)">
                    <path d=" M14.9993 10.8337H10.8327V15.0003C10.8327 15.4587 10.4577 15.8337 9.99935
        15.8337C9.54102 15.8337 9.16602 15.4587 9.16602 15.0003V10.8337H4.99935C4.54102 10.8337 4.16602 10.4587 4.16602
        10.0003C4.16602 9.54199 4.54102 9.16699 4.99935 9.16699H9.16602V5.00033C9.16602 4.54199 9.54102 4.16699 9.99935
        4.16699C10.4577 4.16699 10.8327 4.54199 10.8327 5.00033V9.16699H14.9993C15.4577 9.16699 15.8327 9.54199 15.8327
        10.0003C15.8327 10.4587 15.4577 10.8337 14.9993 10.8337Z" fill="white">
                    </path>
                </g>
                <defs>
                    <clipPath id="clip0_2115_2158">
                        <rect width="20" height="20" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            Add Job

        </button>
    </div>
    <div class="border"></div>
    <div class="mt-10">
        <div class="ml-5 mb-2 grid grid-cols-6 gap-4">
            <p class="text-gray-500">Profil</p>
        </div>
        <div class="ml-5 mb-5">
            <img id="imagePreview" class="w-24 rounded-lg mt-2" alt="Preview"
                src="data:image/jpeg;base64,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">
        </div>
        <p class="ml-5 my-5 font-semibold text-xl mt-10">Basic Information</p>
        <div class="ml-5  grid grid-cols-1  mt-10">
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Email</p>
                <p class="col-span-5">company@gmail.com</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Password</p>
                <p class="col-span-5" id="password">...............</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Postition</p>
                <p class="col-span-5" id="">Information Technology</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Phone Number</p>
                <p class="col-span-5">0812-8907-7786</p>
            </div>
        </div>
        <p class="mx-5 my-5 font-semibold text-xl mt-10">Company Information</p>
        <div class="mx-5 grid grid-cols-1 mt-10" id="detailed_skill">
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Company Name</p>
                <p class="col-span-5">Company</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Website</p>
                <p class="col-span-5">https://company.com</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">LinkedIn</p>
                <a href="#" class="col-span-5 text-blue-600">https://linkedIn/company.com</a>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Address</p>
                <p class="col-span-5">Jl. Basuki Atmajaya no 32, Surabaya, Jawa Timur</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Since</p>
                <p class="col-span-5">29 Agustus 1999</p>
            </div>
            <div class="mb-4 grid grid-cols-6 gap-4">
                <p class="text-gray-500">Description</p>
                <p class="col-span-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse consectetur
                    quis mauris eget placerat. Duis arcu eros, tincidunt non egestas vitae, lobortis vitae arcu. Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus facilisis sem, id ultricies ipsum
                    lacinia a. Integer fringilla eros elit, nec maximus dui tincidunt in. Ut hendrerit diam sit amet
                    imperdiet maximus. Sed feugiat mauris at nulla condimentum, id laoreet dui euismod. Nulla sed ante
                    nec orci pellentesque varius. Integer eleifend urna et elit maximus, ac interdum augue condimentum.
                    Nulla laoreet pulvinar libero vitae rutrum. Aliquam placerat purus et turpis iaculis sodales. Proin
                    molestie volutpat odio a rutrum. Suspendisse a mi ultrices, egestas massa quis, sagittis dui.
                    Maecenas pulvinar convallis mauris, at tincidunt metus tempor vel. Vivamus sit amet rutrum lacus.
                    Suspendisse interdum gravida dignissim. Etiam at erat et ligula ornare rhoncus ac ac ante. Nullam
                    vitae tempus nunc. Donec vitae tempor nunc. Pellentesque convallis felis eget dui fringilla, nec
                    viverra leo pulvinar. Aenean fermentum nibh ac neque molestie condimentum. Ut cursus lacinia elit,
                    et accumsan eros bibendum eu. Donec interdum, metus a commodo feugiat, augue lacus euismod ex, eu
                    placerat velit dui vitae elit. Sed quis nisi quis sem porttitor ullamcorper et id metus. Sed auctor
                    congue leo. In dolor massa, lacinia sed placerat nec, rutrum ullamcorper leo. Nullam gravida lacus
                    eu mauris consequat auctor.</p>
            </div>
        </div>
    </div>
</div>
