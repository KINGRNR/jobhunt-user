<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="../assets/js/quickact.js"></script>
<script src="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


<script>
    var jobs = [];
    // var  = [];
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    $(() => {
        init();
    });

    init = async () => {
        await loaddata();
    }
    // jobMap();

    loaddata = async () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/jobs_detail',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    job = response.jobs;
                    $.each(job, function(i, v) {
                        console.log(v.job_description);
                        $(`#btn-submitjob`).attr('data-id', v.job_id)
                        $(`#title_job`).text(v.job_name);
                        $(`#company_name`).text(v.company_name);
                        $(`#company_website`).html(
                            '<i class="fa fa-link">&nbsp;</i>' + v
                            .company_website);
                        $(`#company_num`).html('<i class="fa fa-phone">&nbsp;</i>' +
                            v
                            .company_number);
                        $(`#company_email`).html(
                            '<i class="fa fa-envelope">&nbsp;</i>' + v.email);
                        $(`#company_name`).text(v.company_name);
                        $(`#company_website`).html(
                            '<i class="fa fa-link">&nbsp;</i>' + v
                            .company_website);
                        $(`.job-desc`).append(v.job_description)
                        jobOverview(v)
                        jobMap(v.job_map_latitude, v.job_map_longitude).then(() => {
                            resolve();
                        });
                    })
                    $('#loading-spinner').css('display', 'none');

                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    jobOverview = (data) => {
        var status = []
        var type = []
        var gender = []
        var lulusan = []
        var experience = []

        if (data.job_status == 1) {
            status =
                `<span
            class="relative bg-green-100 text-green-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Setujui</span>`;
        } else if (data.job_status == 3) {
            status =
                `<span
            class="relative bg-yellow-100 text-yellow-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Proses</span>`
        } else {
            status =
                `<span
            class="relative bg-red-100 text-red-600 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">di Tolak</span>`
        }
        if (data.job_type == 1) {
            type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Full
            Time</span>
        <span`
        } else if (data.job_type == 2) {
            type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Part Time</span>
        <span`
        } else(
            type = `<span
            class="relative bg-figma-blue-gray-50 text-blue-800 text-sm flex items-center justify-center font-medium w-36 h-14 lg:h-10 rounded">Intern</span>
        <span`
        )

        if (data.job_required_gender == 0) {
            gender = "Perempuan";
        } else if (data.job_required_gender == 1) {
            gender = "Laki-Laki"
        } else {
            gender = "All In"
        }
        switch (data.job_education_level) {
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

        switch (data.job_work_experience) {
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
                    <p class="ml-5 text-gray-600">${data.job_expected_salary_range ?? 'Penawaran Saat Offering'} </p>
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
        $('.status').html(status);
        $('.type').html(type);
        $('#job-overview').append(jobOverview)
    }
    jobMap = (lat, long) => {
        return new Promise((resolve, reject) => {
            $('#loading-spinner').css('display', 'none');
            quick.leafletMapShowStatic('map-job', lat, long);
            resolve();
        });
    }
    $('#select-resume').change(function() {
        if ($(this).val() == "choose") {
            $('#create-resume').removeClass('hidden').addClass('block')
            $('#submit-resume').addClass('hidden')
        } else {
            $('#create-resume').removeClass('block').addClass('hidden')
            $('#submit-resume').removeClass('hidden').addClass('block')
        }
        // console.log($(this).val()choose) 
    });

    function submitJob(button) {
        const dataId = $(button).attr("data-id");
        console.log(dataId);
        window.location.href = "/resumepreview?id=" + dataId;
    }
</script>
