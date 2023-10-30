<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<section
    class="bg-[url(https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg)] bg-center bg-cover h-72">
    <div class="bg-black bg-opacity-50 h-72">
        <div class="container flex flex-col justify-center p-6 mx-auto lg:justify-between">
            <div class="text-white flex flex-col justify-center p-6 rounded-sm md:max-w-md xl:max-w-lg md:text-left">
                <p class="ml-0 mt-8 font-poppins text-2xl font-semibold sm:text-3xl">Submit Resume
                </p>
                <div class="mt-4 mb-8 text-lg sm:mb-12 font-medium">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-xl font-medium text-gray-300">
                                <svg class="w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="#" class="ml-1 text-xl font-medium text-white md:ml-2">Submit Resume</a>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <form action="javascript:save()" method="post" id="resume_form" name="resume_form" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <div class="z-40 shadow-lg rounded-lg">
                    <article class="rounded-lg bg-white p-4 border sm:p-6">
                        <div class="leading-8">
                            <div class="mb-5">
                                <p class="font-semibold text-2xl mb-2">Resume</p>
                                <p class="">Create your own resume | <span class="text-figma-biru-300">Easier way
                                        to
                                        apply for jobs!</span></p>
                            </div>
                            <hr class="mb-5 border border-1 border-black">
                            <div class="grid grid-cols-2 gap-8 mb-5">
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Your Name</p>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="text" id="resume_fullname" name="resume_fullname"
                                            class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your full name">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Candidate Expected Salary <span
                                                class="text-figma-biru-300">(optional)</span>
                                        </p>
                                    </div>
                                    <div class="col-span-3">
                                        <select id="resume_expected_salary" name="resume_expected_salary"
                                            class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option selected>--Choose--</option>
                                            <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                                            <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                                            <option value="6.000.000 - 9.000.000">6.000.000 - 9.000.000</option>
                                            <option value="10.000.000 - 15.000.000">10.000.000 - 15.000.000</option>
                                            {{-- <option value="">Custom</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Your email</p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_second_email" name="resume_second_email"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Candidate Education Level <span
                                                class="text-figma-biru-300">(optional)</span></p>
                                    </div>
                                    <div class=" col-span-3">
                                        <select id="resume_education_level" name="resume_education_level"
                                            class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option selected>--Choose--</option>
                                            <option value="0">Lulusan SD/Sederajat</option>
                                            <option value="1">Lulusan SMP/Sederajat</option>
                                            <option value="2">Lulusan SMA/Sederajat</option>
                                            <option value="3">Lulusan S1</option>
                                            <option value="4">Lulusan S2</option>
                                            <option value="5">Lulusan S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Professional Title</p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_professional_title"
                                            name="resume_professional_title"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g “UI/UX Designer”">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Candidate Experience <span
                                                class="text-figma-biru-300">(optional)</span></p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_experience" name="resume_experience"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your experience">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Location</p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_address" name="resume_address"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g “Jakarta” “Malang, Jawa Timur”">
                                    </div>
                                </div>
                                {{-- <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Resume Category</p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_category" name="resume_category"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="">
                                    </div>
                                </div> --}}
                                <div class="grid grid-cols-8 col-span-2">
                                    <div class="text-sm">
                                        <p class="font-semibold">Your Photo</p>
                                    </div>
                                    <div class="col-span-7">
                                        <input name="resume_official_photo" id="resume_official_photo"
                                            class="block w-full text-sm text-gray-500 border border-gray-200 rounded-lg cursor-pointer focus:outline-none mb-2"
                                            id="file_input" type="file">
                                        <span class="text-gray-600">Make sure the photo is formal or polite, and the
                                            face is clearly visible</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-8 col-span-2">
                                    <div class="text-sm">
                                        <p class="font-semibold">Skills</p>
                                    </div>
                                    <div class=" col-span-7">
                                        <input type="text" id="resume_skill" name="resume_skill"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your skills">
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Candidate Gender</p>
                                    </div>
                                    <div class=" col-span-3">
                                        <div class="flex items-center mb-2">
                                            <input id="resume_gender" name="resume_gender" type="radio"
                                                value="1" name="gender"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="gender"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki
                                                - Laki</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input checked id="resume_gender" name="resume_gender" type="radio"
                                                value="0" name="gender"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="resume_gender"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-4">
                                    <div class="text-sm">
                                        <p class="font-semibold">Candidate Age <span
                                                class="text-figma-biru-300">(year)</span></p>
                                    </div>
                                    <div class=" col-span-3">
                                        <input type="text" id="resume_candidate_age" name="resume_candidate_age"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your real age">
                                    </div>
                                </div>
                                <div class="grid grid-cols-8 col-span-2">
                                    <div class="text-sm">
                                        <p class="font-semibold">Resume file <span
                                                class="text-figma-biru-300">(optional)</span></p>
                                    </div>
                                    <div class="col-span-7">
                                        <input name="resume_file"
                                            class="block w-full text-sm text-gray-500 border border-gray-200 rounded-lg cursor-pointer focus:outline-none mb-4"
                                            id="resume_file" type="file">
                                    </div>
                                </div>
                                <div class="grid grid-cols-8 col-span-2">
                                    <div class="text-sm">
                                        <p class="font-semibold">Resume Link</p>
                                    </div>
                                    <div class="col-span-7">
                                        <input type="text" id="resume_link" name="resume_link"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter your resume link">
                                    </div>
                                </div>
                                <div class="grid grid-cols-8 col-span-2">
                                    <div class="text-sm">
                                        <p class="font-semibold">Resume Content</p>
                                    </div>
                                    <div class="col-span-7">
                                        <textarea id="resume_content" name="resume_content" rows="8"
                                            class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder='''></textarea>
                                    </div>
                                </div>
                                <div class="grid grid-cols-8 col-span-2 mb-5">
                                    <div class="text-sm">
                                        <p class="font-semibold">Portofolio <span
                                                class="text-figma-biru-300">(optional)</span></p>
                                    </div>
                                    <div class=" col-span-7">
                                        <input type="text" id="resume_portofolio_link"
                                            name="resume_portofolio_link"
                                            class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="https://">
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-10 border border-1 border-black">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex justify-start">
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-[50%]">
                                        Reset
                                    </button>
                                </div>
                                <div class="flex justify-end">
                                    <button data-modal-hide="popup-modal" type="submit"
                                        class="text-white bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-[50%]">Save</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </form>
        </div>
        @include('landing.support.footer.footer')
    </div>


</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    $(document).ready(function() {
        initResume()
        $('.select').select2({
            placeholder: 'Select an option'
        });
    });

    ClassicEditor
        .create(document.querySelector('#resume_content'))
        .catch(error => {
            console.error(error);
        });
    initResume = () => {
        $.ajax({
            url: '/resumeprev',
            type: 'GET',
            success: function(response) {
                var data = response.resume[0];
                if (response.resume) {
                    $('#resume_fullname').val(data.resume_fullname);
                    $('#resume_expected_salary').val(data.resume_expected_salary);
                    $('#resume_second_email').val(data.resume_second_email);
                    $('#resume_education_level').val(data.resume_education_level);
                    $('#resume_professional_title').val(data.resume_professional_title);
                    $('#resume_experience').val(data.resume_experience);
                    $('#resume_address').val(data.resume_address);
                    $('#resume_category').val(data.resume_category);
                    $('#resume_skill').val(data.resume_skill);
                    $('input[name="resume_gender"][value="' + data.resume_gender + '"]').prop('checked',
                        true);
                    $('#resume_candidate_age').val(data.resume_candidate_age);
                    $('#resume_link').val(data.resume_link);
                    $('#resume_content').val(data.resume_content);
                    $('#resume_portofolio_link').val(data.resume_portofolio_link);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    save = () => {
        var form = "resume_form"
        var data = $('[name="' + form + '"]')[0];
        var formData = new FormData(data);
        console.log(formData);

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Pastikan Data yang di inputkan sudah benar',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: APP_URL + 'resume/save',
                    type: "POST",
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    data: formData,

                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: (response.success) ? 'success' : "error",
                                confirmButtonText: "Oke!",
                            }).then(() => {
                               window.location.href('/resumepreview');
                            });
                        }
                    },
                    error: function(response) {
                        let err_msg = response.responseJSON
                        Swal.fire({
                            title: err_msg.title,
                            text: err_msg.message,
                            icon: (err_msg.success) ? 'success' : "error",
                            buttonsStyling: false,
                            confirmButtonText: "Oke!",
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }
</script>
