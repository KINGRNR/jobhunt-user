<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="parent">
    <section
        class="bg-[url(https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg)] bg-center bg-cover h-72">
        <div class="bg-black bg-opacity-50 h-72">
            <div class="container flex flex-col justify-center p-6 mx-auto lg:justify-between">
                <div class="flex flex-col justify-center p-6 rounded-sm md:max-w-md xl:max-w-lg md:text-left mt-4 mb-20">
                </div>
                <div class="z-10 flex justify-between">
                    <div>
                        <button data-modal-hide="popup-modal" type="button" onclick="changePage()"
                            class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">
                            <i class="fa fa-arrow-left"></i>&nbsp;Edit Resume
                        </button>
                    </div>
                    <div class="flex justify-center z-40 animate-pulse">
                        <div class="object-cover rounded-full w-[222px] h-[222px] p-4 border border-white border-8	">
                        </div>
                    </div>
                    <div class="">
                        <button data-modal-hide="popup-modal" type="button" disabled="disabled" id="submit_job"
                            data-resume="${data.resume_id}"
                            class="text-white bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">Submit
                            Resume&nbsp;<i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-1 gap-2">
        <div class="flex justify-center animate-pulse">
            <div class="h-4 mt-28 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>

            {{-- <p class="mt-28 font-semibold text-2xl ">sd</p> --}}
        </div>
        <div class="flex justify-center animate-pulse">
            <div class="h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-80"></div>
        </div>
        <div class="flex justify-center animate-pulse">
            <div class="h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
        </div>
        <div class="flex justify-center animate-pulse">
            <div class="h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-48"></div>
        </div>
    </div>
    <hr class="mx-5 my-5 border border-1 border-black">
    <p class="mx-auto my-5 font-semibold text-xl container">Candidate Resume</p>
    <hr class="mx-5 my-5 border border-1 border-black">
    <div class="container mx-auto my-12 grid grid-cols-1 ">
        <div class="grid grid-cols-6 ">
            <div class="col-span-4">
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Fullname</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Email</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Professional title</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Location</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Age</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-3 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Skills</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Resume Content</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Resume File</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Resume Link</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Portofolio Link</p>
                    <div class="animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="p-4 mb-6">
                    <article class="rounded-lg bg-white p-4 border border-black sm:p-6">
                        <div class="leading-8">
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-money">&nbsp;</i>Expected Salary</p>
                                <div class="ml-5 animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-venus-mars">&nbsp;</i>Gender</p>
                                <div class="ml-5 animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-graduation-cap">&nbsp;</i>Qualification</p>
                                <div class="ml-5 animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-calendar">&nbsp;</i>Experience</p>
                                <div class="ml-5 animate-pulse h-4 bg-gray-200 rounded-lg dark:bg-gray-700 w-64"></div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@include('resumepreview.javascript')
