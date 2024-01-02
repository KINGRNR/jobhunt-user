<div class="container mx-auto mt-5">
    <div class="flex">
        <p class="m-8 font-semibold text-3xl" id="judul_kategori">List Riwayat Lamaran</p>
    </div>
    <div class="appendJob"></div>

</div>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/js/quickact.js"></script>
<script>
    // var csrfToken = $('meta[name="csrf-token"]').attr('content');
    APP_URL = "{{ getenv('APP_URL') }}/";

    function toggleResume(a) {
        console.log(a)
        var id = $(a).attr('data-id')
        $('.detail-lamaran-' + id).fadeToggle(200);
    }
    $(() => {
        getRiwayatLamaran();
    });
    getRiwayatLamaran = () => {
        quick.ajax({
            url: "{{ route('riwayatlamaranget.get') }}",
            processData: false,
            contentType: false,
            success: function(res) {

                var data = res.data
                $(data).each(function(i, v) {
                    var resumeData = JSON.parse(atob(v.job_apply_resume_detail))
                    var jobData = JSON.parse(atob(v.job_apply_job_detail))
                    console.log(v)

                    var status = [];
                    var Jobstatus = []
                    var type = []
                    var gender = []
                    var lulusan = []
                    var experience = []

                    if (jobData.job_status == 1) {
                        status =
                            `<span
            class="relative bg-green-100 text-green-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Setujui</span>`;
                    } else if (jobData.job_status == 3) {
                        status =
                            `<span
            class="relative bg-yellow-100 text-yellow-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Proses</span>`
                    } else {
                        status =
                            `<span
            class="relative bg-red-100 text-red-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Tolak</span>`
                    }
                    if (jobData.job_type == 1) {
                        type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Full
            Time</span>
        <span`
                    } else if (jobData.job_type == 2) {
                        type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Part Time</span>
        <span`
                    } else(
                        type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Intern</span>
        <span`
                    )

                    if (jobData.job_required_gender == 0) {
                        gender = "Perempuan";
                    } else if (jobData.job_required_gender == 1) {
                        gender = "Laki-Laki"
                    } else {
                        gender = "All In"
                    }
                    switch (jobData.job_education_level) {
                        case 0:
                            lulusan = "Lulusan SD/Sederajat"
                            break;
                        case 1:
                            lulusan = "Lulusan SMP/Sederajat";
                            break;
                        case 2:
                            lulusan = "Lulusan SMA/Sederajat";
                            break;
                        case 3:
                            lulusan = "Lulusan S1";
                            break;
                        case 4:
                            lulusan = "Lulusan S2";
                            break;
                        case 5:
                            lulusan = "Lulusan S3";
                            break;
                        default:
                            lulusan = "Tidak ada minimum pendidikan"
                            break;
                    }

                    switch (jobData.job_work_experience) {
                        case 0:
                            experience = "Kurang dari 1 Tahun"
                            break;
                        case 1:
                            experience = "1 - 5 Tahun"
                            break;
                        case 2:
                            experience = "5 - 10 Tahun"
                            break;
                        case 3:
                            experience = "10  - 20 Tahun"
                            break;
                        case 4:
                            experience = "Lebih dari 20 Tahun"
                            break;
                        default:
                            experience = "Tidak ada minimum pengalaman"
                            break;
                    }
                    var jobOverview = `<div class="leading-8">
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-money">&nbsp;</i>Expected Salary</p>
                    <p class="ml-5 text-gray-600">${jobData.job_expected_salary_range ?? 'Penawaran Saat Offering'} </p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-venus-mars">&nbsp;</i>Gender</p>
                    <p class="ml-5 text-gray-600">${gender}</p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-graduation-cap">&nbsp;</i>Qualification</p>
                    <p class="ml-5 text-gray-600">${lulusan ?? 'Tidak ada minimum pendidikan'}</p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-calendar">&nbsp;</i>Experience</p>
                    <p class="ml-5 text-gray-600">${experience}</p>
                </div>
            </div>`
                    // $('.status').html(status);
                    // $('.type').html(type);
                    switch (resumeData.resume_education_level) {
                        case '0':
                            lulusan = "Lulusan SD/Sederajat"
                            break;
                        case '1':
                            lulusan = "Lulusan SMP/Sederajat";
                            break;
                        case '2':
                            lulusan = "Lulusan SMA/Sederajat";
                            break;
                        case '3':
                            lulusan = "Lulusan S1";
                            break;
                        case '4':
                            lulusan = "Lulusan S2";
                            break;
                        case '5':
                            lulusan = "Lulusan S3";
                            break;
                        default:
                            break;
                    }
                    if (resumeData.resume_gender == 0) {
                        gender = "Perempuan";
                    } else {
                        gender = "Laki-Laki"
                    }

                    var resume = `<img class="object-cover rounded-lg w-[222px] h-[222px] mb-5"
                                                    src="${APP_URL +'file/user_photo/'+ resumeData.resume_official_photo }"
                                                alt="image description">
                                    <div class="grid grid-cols-6 ">

                                        <div class="col-span-4">
                                            <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Fullname</p>
                                                    <p class="col-span-5">${resumeData.resume_fullname}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Email</p>
                                                    <p class="col-span-5">${resumeData.resume_second_email}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Professional title</p>
                                                    <p class="col-span-5">${resumeData.resume_professional_title}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Location</p>
                                                    <p class="col-span-5">${resumeData.resume_address}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Age</p>
                                                    <p class="col-span-5">${resumeData.resume_candidate_age} Tahun</p>
                                                </div>
                                                <div class="mb-3 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Skills</p>
                                                    ${resumeData.resume_skill}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Resume Content</p>
                                                    <p class="col-span-5">${resumeData.resume_content}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Resume File</p>
                                                    <a data-modal-hide="popup-modal" href="/file/resume_file/${resumeData.resume_file}" class="text-white text-center bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44">
                                                                        Detail File
                                                                </a>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Resume Link</p>
                                                    <p class="col-span-5">${resumeData.resume_link}</p>
                                                </div>
                                                <div class="mb-5 grid grid-cols-6 gap-4">
                                                    <p class="text-gray-500">Portofolio Link</p>
                                                    <p class="col-span-5">${resumeData.resume_portofolio_link}</p>
                                                </div>
                                        </div>
                                        <div class="col-span-2">
                                            <div class="p-4 mb-6">
                                                <article class="rounded-lg bg-white p-4 border sm:p-6">
                                                    <div class="leading-8">
                                                            <div class="text-sm mb-5">
                                                                <p class="font-semibold"><i class="fa fa-money">&nbsp;</i>Expected Salary</p>
                                                                <p class="ml-5 text-gray-600">${resumeData.resume_expected_salary}</p>
                                                            </div>
                                                            <div class="text-sm mb-5">
                                                                <p class="font-semibold"><i class="fa fa-venus-mars">&nbsp;</i>Gender</p>
                                                                <p class="ml-5 text-gray-600">${gender}</p>
                                                            </div>
                                                            <div class="text-sm mb-5">
                                                                <p class="font-semibold"><i class="fa fa-graduation-cap">&nbsp;</i>Qualification</p>
                                                                <p class="ml-5 text-gray-600">${lulusan}</p>
                                                            </div>
                                                            <div class="text-sm mb-5">
                                                                <p class="font-semibold"><i class="fa fa-calendar">&nbsp;</i>Experience</p>
                                                                <p class="ml-5 text-gray-600">${resumeData.resume_experience}</p>
                                                            </div>
                                                        </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>`
                    if (v.job_apply_status == 2) {
                        status =
                            `<span
                                class="relative bg-green-100 text-green-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Setujui</span>`;
                    } else if (v.job_apply_status == 0) {
                        status =
                            `<span
                                class="relative bg-yellow-100 text-yellow-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Proses Pengajuan</span>`
                    } else {
                        status =
                            `<span
                                class="relative bg-red-100 text-red-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Tolak</span>`
                    }
                    var detailHistory = `
                                <article class="rounded-lg bg-white p-4 shadow-sm transition mb-6 hover:shadow-lg sm:p-6">

                                <div class="grid grid-cols-1 lg:flex gap-6">
                                    <span class="flex-none justify-start">
                                        <svg width="141" height="136" viewBox="0 0 141 136" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect x="0.5" width="140.185" height="136" fill="url(#pattern0)"></rect>
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0_503_939" transform="matrix(0.0078125 0 0 0.00805288 0 -0.0153846)">
                                                    </use>
                                                </pattern>
                                                <image id="image0_503_939" width="128" height="128"
                                                    xlink:href="data:image/png;base64,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">
                                                </image>
                                            </defs>
                                        </svg>
                                    </span>

                                    <div class="grow grid grid-cols-1">
                                                    <p class="mt-2 text-2xl font-bold text-black">
                                                        ${jobData.job_name}
                                                        </p>
                                                        <p class="mt-2 text-xl font-semibold text-black">
                                                        ${v.company_name}
                                                            </p>
                                                        <p class="mt-2 font-normal text-figma-gray-500">
                                                            ${jobData.job_description}
                                                        </p>
                                        </div>
                                    <span
                                        class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-12 lg:h-10 rounded">${jobData.job_type
                                                                === '1' ? 'Full Time' : jobData.job_type === '2' ? 'Part Time' : jobData.job_type
                                                                === '3' ? 'Intern' : ''}</span>
                                        ${status}

                                    <button onclick="toggleResume(this)" data-id="${v.job_apply_id}"
                                        class="relative bg-gray-200 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded"
                                        style="">Detail</button>

                                </div>
                                <div class="container mx-auto grid grid-cols-1 detail-lamaran-${v.job_apply_id}" style="display: none;">
                                    <hr class="mx-5 my-5  border border-1 border-black">
                                    <p class="font-semibold text-xl flex justify-center">Detail Submitted Resume</p>
                                    <hr class="mx-5 my-5  border border-1 border-black">
                                    <p class="text-gray-500">Resume last Updated at <span class="italic">29-12-2023 10:54</span></p>
                                    ${resume}
                                    <hr class="mx-5 my-5  border border-1 border-black">
                                    <p class="font-semibold text-xl flex justify-center">Detail Submitted Job</p>
                                    <hr class="mx-5 my-5  border border-1 border-black">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-6 header-job-detail">
                                        <article class="mb-6 sm:p-6 col-span-3">
                                            <div class="cols-2 row-dense md:flex gap-6">
                                                <span class="flex justify-center order-1 col-span-2">
                                                    <svg width="141"
                                                        class="rounded-lg bg-white p-4 shadow-sm transition hover:shadow-lg border border-gray-200"
                                                        height="136" viewBox="0 0 141 136" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect x="0.5" width="140.185" height="136" fill="url(#pattern0)"></rect>
                                                        <defs>
                                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                                height="1">
                                                                <use xlink:href="#image0_503_939"
                                                                    transform="matrix(0.0078125 0 0 0.00805288 0 -0.0153846)"></use>
                                                            </pattern>
                                                            <image id="image0_503_939" width="128" height="128"
                                                                xlink:href="data:image/png;base64,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">
                                                            </image>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <div class="grid grid-cols-1 order-2 text-center md:text-left">
                                                    <p class="text-2xl font-bold text-black">
                                                        ${jobData.job_name}
                                                        </p>
                                                        <p class="text-xl font-semibold text-black">
                                                        ${v.company_name}
                                                            </p>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="job-detail grid grid-cols-1 gap-1 lg:grid-cols-6 lg:gap-6 text-left lg:mt-2">
                                        <div class="p-4 mb-6 sm:p-6 col-span-4 md:col-span-4">
                                            <p class="font-semibold text-xl mb-5 text-center md:text-left">Job Description</p>
                                            <div
                                                class="mx-4 text-gray-800 font-normal leading-loose text-sm text-center md:text-left job-desc">

                                                ${jobData.job_description}
                                            </div>
                                        </div>
                                        <div class="p-4 col-span-6 md:col-span-2 lg:mb-6">
                                            <p class="font-semibold text-xl mb-5 text-center md:text-left">Job Overview</p>
                                            <article
                                                class="rounded-lg bg-white text-center p-4 border sm:p-6 sm:text-center md:text-left lg:text-left"
                                                id="job-overview">

                                                ${jobOverview}
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                </article>
                                                `;
                    $('.appendJob').append(detailHistory);


                });

            },
        })
    }
    jobMap = (lat, long, msg) => {
        quick.leafletMapShowStatic('map-job', lat, long, msg);
    }
</script>
