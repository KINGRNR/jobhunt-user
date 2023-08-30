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
<div class="loading-spinner-overlay" id="loading-spinner" style="display: none;">
    <div class="loading-spinner"></div>
    <p>Loading Data</p>
</div>
<div class="grid grid-cols-4">
    <div class="order-1 flex">
        <div class="bg-figma-agakbiru pr-36 max-h-[630px]">
            <div class="block ml-12 my-12">
                <p class="mb-8 text-xl font-semibold text-white">Job Type</p>
                <div class="flex items-center mb-6">
                    <form id="filter-form" action="javascript:loadData(this)" method="post">
                        <input checked id="default-radio-1" type="radio" value="" name="job_type"
                            class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                        <label for="default-radio-1" class="ml-2 font-medium text-white">All</label>
                </div>
                <div class="flex items-center mb-6">
                    <input id="default-radio-2" type="radio" value="1" name="job_type"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-2" class="ml-2 font-medium text-white">Full Time</label>
                </div>
                <div class="flex items-center mb-6">
                    <input id="default-radio-3" type="radio" value="2" name="job_type"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-3" class="ml-2 font-medium text-white">Part Time</label>
                </div>
                <div class="flex items-center mb-6">
                    <input id="default-radio-4" type="radio" value="3" name="job_type"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-4" class="ml-2 font-medium text-white">Intern</label>
                </div>
            </div>
            <div class="block ml-12 my-12">
                <p class="mb-8 text-xl font-semibold text-white">Specialism</p>
                <div class="flex items-center mb-6">
                    <input id="default-radio-5" type="radio" value="" name="specialism"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-5" class="ml-2 font-medium text-white">All</label>
                </div>
                <div class="flex items-center mb-6">
                    <input checked id="default-radio-6" type="radio" value="" name="specialism"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-6" class="ml-2 font-medium text-white">Design Graphic</label>
                </div>
                <div class="flex items-center mb-6">
                    <input id="default-radio-7" type="radio" value="" name="specialism"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-7" class="ml-2 font-medium text-white">Design UI/UX</label>
                </div>
                <div class="flex items-center mb-6">
                    <input id="default-radio-8" type="radio" value="" name="specialism"
                        class="w-4 h-4 text-figma-agakbiru bg-white border-white checked:ring-white checked:ring-2 duration-75">
                    <label for="default-radio-8" class="ml-2 font-medium text-white">Deck PPT</label>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="order-2 col-span-3">
        <div class="grid grid-cols-1">
            <div class="flex">
                {{-- dinamis --}}
                <p class="m-8 font-semibold text-3xl" id="judul_kategori">Tidak Berkategori</p>
            </div>
            <div class="flex">
                <p class="mx-8 mb-8 text-gray-500">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="relative mx-8 mb-8">
                <div class="relative flex items-center">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa fa-search text-gray-500"></i>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-4 py-4 duration-100"
                        placeholder="Ketik untuk mencari" oninput="handleInput()">
                    {{-- <button type="submit"
                        class="absolute right-0 top-0 h-full bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-r-full px-4 py-2"
                        onclick="searchJob()">
                        Cari
                    </button> --}}
                </div>
                <div id="search-dropdown"
                    class="w-1/2 max-w-md bg-white border border-gray-300 border-t-0 z-10 absolute left-0 mt-1 hidden rounded-lg shadow-md">

                </div>
            </div>
            <div class="text-gray-700 text-xs mb-2" id="search-info">
            </div>
            <div class="container" id="daftar_pekerjaan">
            </div>
        </div>
    </div>
</div>

@include('category.javascript')
