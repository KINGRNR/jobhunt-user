<section
    class="bg-[url(https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg)] bg-center bg-cover h-72">
    <div class="bg-black bg-opacity-50 h-72">
        <div class="container flex flex-col justify-center p-6 mx-auto lg:justify-between">
            <div class="flex flex-col justify-center p-6 rounded-sm md:max-w-md xl:max-w-lg md:text-left mt-4 mb-20">
            </div>
            <div class="flex justify-between">
                <div>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">
                        Reset
                    </button>
                </div>
                <div class="flex justify-center z-40">
                    <img class="object-cover rounded-full w-[222px] h-[222px]"
                        src="https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg"
                        alt="image description">
                </div>
                <div class="">
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-white bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">
                        Simpan
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="mx-5 mt-36 mb-5 border border-1 border-black">
<p class="mx-5 my-5 font-semibold text-xl">User Detail</p>
<hr class="mx-5 my-5 border border-1 border-black">
<div class="mx-5 my-12 grid grid-cols-1">
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Username</p>
        {{-- jancok tailwind autis, maunya col-span-7 bangsat, col-span-5 ngeyel amat kaya bocah kontol --}}
            <input type="text" id="name" name="name"
            class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
            placeholder="Enter your Username">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Email</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your email">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Password</p>
        <input type="password" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your password">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Region</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your region">
    </div>
</div>
{{-- <hr class="mx-5 my-5 border border-1 border-black">
<p class="mx-5 my-5 font-semibold text-xl">Skill Detail</p>
<hr class="mx-5 my-5 border border-1 border-black">
<div class="mx-5 my-12 grid grid-cols-1">
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Qualification</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your qualification" value="halo">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Skill</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your skills" value="kys">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Resume File</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your resume files" value="kys">
    </div>
    <div class="mb-4 grid grid-cols-8 gap-4">
        <p class="text-gray-500">Portofolio</p>
        <input type="text" id="name" name="name"
        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 col-span-7"
        placeholder="Enter your portofolio" value="kys">
    </div>
</div> --}}
