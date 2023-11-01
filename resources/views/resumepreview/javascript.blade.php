<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    APP_URL = "{{ getenv('APP_URL') }}/";

    var jobs = [];
    $(() => {
        initResume()
            .then(() => {
                redirectCheck();
            })
            .catch(error => {
                console.error(error);
            });
    });
    redirectCheck = () => {
        const currentURL = window.location.href;
        const url = new URL(currentURL);
        const parameterValue = url.searchParams.get("id");
        if (parameterValue) {
            $('#submit_job').removeAttr('disabled', 'disabled').attr('data-id', parameterValue).attr('onclick',
                'submitJob(this)');
        }
    }

    initResume = () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/resumeprev',
                type: 'GET',
                success: function(response) {
                    if (response.resume == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sepertinya anda belum membuat resume!',
                            confirmButtonText: 'Buat Sekarang',
                            showCancelButton: true,
                            cancelButtonText: 'Batal',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/resume';
                            } else if (result.isDismissed) {
                                window.history.back();
                            }
                        });
                    } else {

                        var data = response.resume[0]
                        var gender = data.resume_gender
                        var lulusan = []
                        switch (data.resume_education_level) {
                            case '1':
                                lulusan = "Lulusan SD/Sederajat"
                                break;
                            case '2':
                                lulusan = "Lulusan SMP/Sederajat";
                                break;
                            case '3':
                                lulusan = "Lulusan SMA/Sederajat";
                                break;
                            case '4':
                                lulusan = "Lulusan S1";
                                break;
                            case '5':
                                lulusan = "Lulusan S2";
                                break;
                            case '6':
                                lulusan = "Lulusan S3";
                                break;
                            default:
                                break;
                        }

                        var html = `<section
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
                    <div class="flex justify-center z-40">
                        <img class="object-cover rounded-full w-[222px] h-[222px] p-4 border border-white border-4"
                            src="${APP_URL +'file/user_photo/'+ data.resume_official_photo }"
                            alt="image description">
                    </div>
                    <div class="">  
                        <button data-modal-hide="popup-modal" type="button" disabled="disabled" id="submit_job" data-resume="${data.resume_id}"
                            class="text-white bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">Submit
                            Resume&nbsp;<i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-1 gap-2">
        <div class="flex justify-center">
            <p class="mt-28 font-semibold text-2xl">${data.resume_fullname}</p>
        </div>
        <div class="flex justify-center">
            <p class="font-medium">${data.resume_professional_title}</p>
        </div>
        <div class="flex justify-center">
            <p class="font-medium"><i class="fa fa-envelope-o"></i>&nbsp;${data.resume_second_email}</p>
        </div>
        <div class="flex justify-center">
            <p class="font-medium"><i class="fa fa-map-marker"></i>&nbsp;${data.resume_address}</p>
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
                    <p class="col-span-5">${data.resume_fullname}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Email</p>
                    <p class="col-span-5">${data.resume_second_email}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Professional title</p>
                    <p class="col-span-5">${data.resume_professional_title}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Location</p>
                    <p class="col-span-5">${data.resume_address}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Age</p>
                    <p class="col-span-5">${data.resume_candidate_age} Tahun</p>
                </div>
                <div class="mb-3 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Skills</p>
                    ${data.resume_skill}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Resume Content</p>
                    <p class="col-span-5">${data.resume_content}</p>
                </div>
                <div class="mb-5 grid grid-cols-6 gap-4">
                    <p class="text-gray-500">Portofolio Link</p>
                    <p class="col-span-5">${data.resume_portofolio_link}</p>
                </div>
            </div>
            <div class="col-span-2">
                <div class="p-4 mb-6">
                    <article class="rounded-lg bg-white p-4 border border-black sm:p-6">
                        <div class="leading-8">
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-money">&nbsp;</i>Expected Salary</p>
                                <p class="ml-5 text-gray-600">${data.resume_expected_salary}</p>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-venus-mars">&nbsp;</i>Gender</p>
                                <p class="ml-5 text-gray-600">k</p>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-graduation-cap">&nbsp;</i>Qualification</p>
                                <p class="ml-5 text-gray-600">${lulusan}</p>
                            </div>
                            <div class="text-sm mb-5">
                                <p class="font-semibold"><i class="fa fa-calendar">&nbsp;</i>Experience</p>
                                <p class="ml-5 text-gray-600">${data.resume_experience}</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>`;
                        $(`.parent`).html(html);

                    }
                    resolve();
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }
    changePage = () => {
        window.location.href = '/resume';
    }

    submitJob = () => {
        var submitJobData = {
            data_id: $('#submit_job').data('id'),
            data_resume: $('#submit_job').data('resume')
        };

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Pastikan data yang akan anda kirim sudah benar!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            // })
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: APP_URL + 'resume/submitJob',
                    type: "POST",
                    processData: false,
                    contentType: 'application/json', // Mengatur tipe konten ke JSON
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    data: JSON.stringify(submitJobData),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: (response.success) ? 'success' : "error",
                                confirmButtonText: "Sip!",
                            }).then(() => {
                                window.location.href = '/resumepreview';
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
