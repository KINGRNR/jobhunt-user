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

<div class="container flex flex-col justify-center p-6 mx-auto lg:justify-between">
    <form action="javascript:save()" method="post" id="job_form" name="job_form" autocomplete="off"
        enctype="multipart/form-data">
        @csrf

        <div class="z-40 shadow-lg rounded-lg">
            <article class="rounded-lg bg-white p-4 border sm:p-6">
                <div class="leading-8">
                    <div class="mb-5">
                        <p class="font-semibold text-2xl mb-2">Post A Job</p>
                        <p class="">Create ... | <span class="text-figma-biru-300">Easier way!</span></p>
                    </div>
                    <hr class="mb-5 border border-1 border-black">
                    <div class="gap-8 mb-5">
                        <div class="mb-5">
                            <div class="text-sm mb-2">
                                <p class="font-semibold required">Judul Pekerjaan</p>
                            </div>
                            <div class="col-span-3">
                                <input type="text" id="formjob_worktitle" name="formjob_worktitle"
                                    class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your work's name" required>
                            </div>
                        </div>
                        {{-- <div class="mb-5">
                            <div class="text-sm mb-2">
                                <p class="font-semibold">Nama Perusahaan</p>
                            </div>
                            <div class="col-span-3">
                                <input type="text" id="formjob_companyname" name="formjob_companyname"
                                    class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter your company name" required>
                            </div>
                        </div> --}}
                        {{-- <div class="grid grid-cols-3 gap-8 mb-5">
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Email</p>
                                </div>
                                <div class=" col-span-3">
                                    <input type="text" id="formjob_email" name="formjob_email"
                                        class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Website</p>
                                </div>
                                <div class=" col-span-3">
                                    <input type="text" id="formjob_website" name="formjob_website"
                                        class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="https://">
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Nomor Telp</p>
                                </div>
                                <div class=" col-span-3">
                                    <input type="text" id="resume_second_email" name="resume_second_email"
                                        class=" block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="08xx-xxxx-xxxx">
                                </div>
                            </div>
                        </div> --}}
                        <div class="gap-8 mb-5">
                            <div class="text-sm mb-2">
                                <p class="font-semibold">Deskripsi Pekerjaan</p>
                            </div>
                            <div class=" col-span-3">
                                <textarea id="deskripsi_job" name="deskripsi_job" rows="8"
                                    class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    placeholder=''></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-8 mb-5">
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Posisi</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_jobtype" name="formjob_jobtype"
                                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" selected>--Choose--</option>
                                        <option value="1">Fulltime</option>
                                        <option value="2">Part Time</option>
                                        <option value="3">Intern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Gaji Pekerjaan</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_wages" name="formjob_wages"
                                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" selected>--Choose--</option>
                                        <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                                        <option value="6.000.000 - 9.000.000">6.000.000 - 9.000.000</option>
                                        <option value="10.000.000 - 15.000.000">10.000.000 - 15.000.000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Level Pendidikan</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_education_level" name="formjob_education_level"
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
                        </div>
                        <div class="grid grid-cols-3 gap-8 mb-5">
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Lama Pengalaman Kerja</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_workexp" name="formjob_workexp"
                                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" selected>--Choose--</option>
                                        <option value="0">
                                            < 1 Tahun </option>
                                        <option value="1"> 1-5 Tahun </option>
                                        <option value="2"> 5-10 Tahun </option>
                                        <option value="3"> 10-20 Tahun </option>
                                        <option value="4"> > 20 Tahun </option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Jenis Kelamin</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_sex" name="formjob_sex"
                                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" selected>--Choose--</option>
                                        <option value="0">Laki-laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Kategori Pekerjaan</p>
                                </div>
                                <div class=" col-span-3">
                                    <select id="formjob_jobcategory" name="formjob_jobcategory"
                                        class="block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" selected>--Choose--</option>
                                        <option value="1">Teknologi Informasi</option>
                                        <option value="2">Ekonomi</option>
                                        <option value="3">Teknik & Industri</option>
                                        <option value="4">Seni & Sastra</option>
                                        <option value="5">Pendidikan</option>
                                        <option value="6">Perhotelan & Travel</option>
                                        <option value="7">Food & Beverage</option>
                                        <option value="8">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="text-sm mb-2">
                                <p class="font-semibold">Location</p>
                            </div>
                            <div class="p-4 mb-6 z-10 mx-8 w-75 h-64 sm:p-6" id="map-job">
                            </div>
                            <input type="text" name="latitude" id="latitude" hidden>
                            <input type="text" name="longitude" id="longitude" hidden>
                            <div class="grid grid-cols-1">
                                <div class="text-sm mb-2">
                                    <p class="font-semibold">Detail Address</p>
                                </div>
                                <div class=" col-span-3">
                                    <textarea name="detailed_address" id="" cols="10" rows="10" class="mb-4 block w-full p-4 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>

                                </div>
                            </div>
                            <hr class="mb-10 border border-1 border-black">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex justify-start">
                                    <a data-modal-hide="popup-modal" href="/company/formjob"
                                        class="text-figma-biru-300 bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm text-center font-medium px-5 py-2.5 focus:z-10 w-[50%]">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/quickact.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    $(document).ready(function() {
        // initResume()
        initMap()
        // $('.select').select2({
        //     placeholder: 'Select an option'
        // });
        // $("#resume_official_photo").change(function() {
        //     var fileInput = document.getElementById('resume_official_photo');
        //     var imagePreview = document.getElementById('imagePreview');
        //     var currentImage = document.getElementById('currentImage');

        //     if (fileInput.files && fileInput.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             imagePreview.src = e.target.result;
        //             imagePreview.classList.remove('hidden');
        //             currentImage.classList.add('hidden');
        //         };
        //         reader.readAsDataURL(fileInput.files[0]);
        //     }
        // });
    });

    ClassicEditor
        .create(document.querySelector('#deskripsi_job'))
        .catch(error => {
            console.error(error);
        });

    initMap = () => {
        var a = '#latitude'
        var b = '#longitude'
        quick.leafletMapSelector('map-job', a, b);
    }
    // initResume = () => {
    //     $.ajax({
    //         url: '/resumeprev',
    //         type: 'GET',
    //         success: function(response) {
    //             var data = response.resume[0];
    //             if (response.resume) {
    //                 $('#resume_fullname').val(data.resume_fullname);
    //                 $('#resume_expected_salary').val(data.resume_expected_salary);
    //                 $('#resume_second_email').val(data.resume_second_email);
    //                 $('#resume_education_level').val(data.resume_education_level);
    //                 $('#resume_professional_title').val(data.resume_professional_title);
    //                 $('#resume_experience').val(data.resume_experience);
    //                 $('#resume_address').val(data.resume_address);
    //                 $('#resume_category').val(data.resume_category);
    //                 $('#resume_skill').val(data.resume_skill);
    //                 $('input[name="resume_gender"][value="' + data.resume_gender + '"]').prop('checked',
    //                     true);
    //                 $('#resume_content').text(data.resume_content)
    //                 $('#resume_candidate_age').val(data.resume_candidate_age);
    //                 $('#resume_link').val(data.resume_link);
    //                 $('#resume_content').val(data.resume_content);
    //                 $('#resume_portofolio_link').val(data.resume_portofolio_link);
    //             }
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // }
    save = () => {
        var form = "job_form"
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
                        url: APP_URL + 'job/save',
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
                            Swal.fire({
                                title: err_msg.title,
                                text: err_msg.message,
                                icon: (err_msg.success) ? 'success' : "error",
                                confirmButtonText: "Oke!",
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
