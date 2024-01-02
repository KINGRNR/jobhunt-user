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
    <p>Loading..</p>

</div>
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
                                <a href="#" class="hidden ml-1 text-xl font-medium text-white md:ml-2">Submit
                                    Resume</a>
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
                                            placeholder="Enter your full name" required>
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
                                            <option value="-" selected>--Choose--</option>
                                            <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                                            <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                                            <option value="6.000.000 - 9.000.000">6.000.000 - 9.000.000</option>
                                            <option value="10.000.000 - 15.000.000">10.000.000 - 15.000.000</option>
                                            {{-- <option value="10.000.000 - 15.000.000">10.000.000 - 15.000.000</option> --}}
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
                                            <option value="-" selected>--Choose--</option>
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
                                            face is clearly visible<span class="text-figma-biru-300">(Maks. 5mb,
                                                png,jpeg,jpg)</span></span>

                                        <div class="holder relative">
                                            <button type="button" onclick="removePhoto(this)" data-id="1"
                                                class="text-white bg-merah hover:bg-blue-800 focus:ring-blue-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-3 text-center rounded-lg">Remove
                                                Photo
                                            </button>
                                            <div class="image-container">
                                                <div class="loader" style="display: none;">
                                                    <div class="flex items-center justify-center w-[222px] h-[222px] border border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 rounded-full border border-white border-4">
                                                        <div role="status">
                                                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                                            <span class="">Loading Photo...</span>
                                                        </div>
                                                    </div>                                                </div>
                                                <img id="imgPreview"
                                                    class="object-cover rounded-full w-[222px] h-[222px] border border-white border-4"
                                                    src="#" alt="pic" style="display: none;" />
                                            </div>
                                        </div>

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
                                            placeholder=''></textarea>
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
                                    <a data-modal-hide="popup-modal" href="/resumepreview"
                                        class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm text-center font-medium px-5 py-2.5 focus:z-10 w-[50%]">
                                        Batal
                                    </a>
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
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    $(document).ready(function() {
        initResume()
        $('.select').select2({
            placeholder: 'Select an option'
        });

        $("#resume_official_photo").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgPreview").fadeIn()
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
    $('input').change(function() {
        return "Any string value here forces a dialog box to \n" +
            "appear before closing the window.";
    });

    // function closeIt() {
    //     return "Any string value here forces a dialog box to \n" +
    //         "appear before closing the window.";
    // }
    // window.onbeforeunload = saveDraft();
    var form = "resume_form"
    var data = $('[name="' + form + '"]')[0];
    var formData = new FormData(data);

    function saveDraft() {
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
                // if (response.success) {
                //     $('#loading-spinner').css('display', 'none');
                //     Swal.fire({
                //         title: response.title,
                //         text: response.message,
                //         icon: (response.success) ? 'success' : "error",
                //         confirmButtonText: "Oke!",

                //     }).then(() => {
                //         window.location.href = '/resumepreview';
                //     });
                // }
            },
            error: function(response) {
                let err_msg = response.responseJSON
                console.log(err_msg)
                $('#loading-spinner').css('display', 'none');
                Swal.fire({
                    title: err_msg.title,
                    text: err_msg.message,
                    icon: (err_msg.success) ? 'success' : "error",
                    confirmButtonText: "Oke!",
                });
            }
        });
    }
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

                if (data) {
                    $('.loader').show();
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
                    $('#resume_content').text(data.resume_content)
                    $('#resume_candidate_age').val(data.resume_candidate_age);
                    $('#resume_link').val(data.resume_link);
                    $('#resume_content').val(data.resume_content);
                    $('#resume_portofolio_link').val(data.resume_portofolio_link);
                }

                if (data && data.resume_official_photo) {
                    var img = new Image();
                    img.onload = function() {
                        $('#imgPreview').fadeIn().attr('src', img.src);
                        $('.loader').hide();

                    };
                    img.src = APP_URL + 'file/user_photo/' + data.resume_official_photo;
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
        var inputElements = $('input[type="text"], select').not('input[type="file"]');
        var isEmpty = false;
        inputElements.each(function() {
            if ($(this).val() === "") {
                isEmpty = true;
                return false;
            }
        });

        if (isEmpty) {
            Swal.fire({
                title: 'Error',
                text: 'Harap isi semua input.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        } else {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Pastikan Data yang di inputkan sudah benar',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loading-spinner').css('display', '')
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
                            if (response.success) {
                                $('#loading-spinner').css('display', 'none');
                                Swal.fire({
                                    title: response.title,
                                    text: response.message,
                                    icon: (response.success) ? 'success' : "error",
                                    confirmButtonText: "Oke!",

                                }).then(() => {
                                    window.location.href = '/resumepreview';
                                });
                            }
                        },
                        error: function(response) {
                            let err_msg = response.responseJSON
                            console.log(err_msg)
                            $('#loading-spinner').css('display', 'none');
                            // Swal.fire({
                            //     title: err_msg.title,
                            //     text: err_msg.message,
                            //     icon: (err_msg.success) ? 'success' : "error",
                            //     confirmButtonText: "Oke!",
                            // });
                            Toast.fire({
                                title: err_msg.title,
                                text: err_msg.message,
                                icon: (err_msg.success) ? 'success' : "error",
                                timer: 3500,
                            });
                        }
                    });
                }
            });
        }
    }

    function validateForm() {

    }
</script>
