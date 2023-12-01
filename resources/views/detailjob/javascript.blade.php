<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="assets/js/quickact.js"></script>

<script>
    var jobs = [];
    // var  = [];
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    $(() => {
        init()
    });
    init = () => {
        // loadPage();
        loaddata();
    }

    loaddata = () => {
        $.ajax({
            url: '/jobs_detail',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.main-data-job').empty()
                job = response.jobs;
                $.each(job, function(i, v) {
                    console.log(v);
                    $(`#btn-submitjob`).attr('data-id', v.job_id)
                    $(`#title_job`).text(v.job_name);
                    $(`#company_name`).text(v.company_name);
                    $(`#company_website`).html('<i class="fa fa-link">&nbsp;</i>' + v
                        .company_website);
                    $(`#company_num`).html('<i class="fa fa-phone">&nbsp;</i>' + v
                        .company_number);
                    $(`#company_email`).html('<i class="fa fa-envelope">&nbsp;</i>' + v.email);
                    $(`#company_name`).text(v.company_name);
                    $(`#company_website`).html('<i class="fa fa-link">&nbsp;</i>' + v
                        .company_website);
                    jobMap(v.job_map_latitude, v.job_map_longitude, v.detailed_address);
                    var main = `<div class="p-4 mb-6 sm:p-6 col-span-4 md:col-span-4">
        <p class="font-semibold text-xl mb-5 text-center md:text-left">Job Description</p>
        <div class="mx-4 text-gray-800 font-normal leading-loose text-sm text-center md:text-left">${v.job_description}
        </div>
    </div>
    <div class="p-4 col-span-6 md:col-span-2 lg:mb-6">
        <p class="font-semibold text-xl mb-5 text-center md:text-left">Job Overview</p>
        <article class="rounded-lg bg-white text-center p-4 border border-black sm:p-6 sm:text-center md:text-left lg:text-left">
            <div class="leading-8">
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-money">&nbsp;</i>Job Salary</p>
                    <p class="ml-5 text-gray-600">${v.job_expected_salary_range}</p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-venus-mars">&nbsp;</i>Gender</p>
                    <p class="ml-5 text-gray-600">Male</p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-graduation-cap">&nbsp;</i>Qualification</p>
                    <p class="ml-5 text-gray-600">Master Degree</p>
                </div>
                <div class="text-sm mb-5">
                    <p class="font-semibold"><i class="fa fa-calendar">&nbsp;</i>Experience</p>
                    <p class="ml-5 text-gray-600">1 year - 3 years</p>
                </div>
            </div>
        </article>
    </div>`;
                    $('.main-data-job').append(main)

                })
                $('#loading-spinner').css('display', 'none');

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    jobMap = (lat, long, msg) => {
        quick.leafletMapShowStatic('map-job', lat, long, msg);
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
