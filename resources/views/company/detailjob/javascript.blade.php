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
        init()
    });
    init = () => {
         initTable();
        jobMap();
    }
    initTable = () => {
        let table = new DataTable('#table-pelamar');
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
                    jobMap(v.alamat_map_latitude, v.alamat_map_longitude);

                })
                $('#loading-spinner').css('display', 'none');

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    jobMap = (lat, long) => {
        $('#loading-spinner').css('display', 'none');

        quick.leafletMapShowStatic('map-job', lat, long);
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
