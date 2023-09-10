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
                job = response.jobs;
                $.each(job, function(i, v) {
                    console.log(v);
                    $(`#title_job`).text(v.job_name);
                    $(`#company_name`).text(v.company_name);
                    $(`#company_website`).html('<i class="fa fa-link">&nbsp;</i>' + v.company_website);
                    $(`#company_num`).html('<i class="fa fa-phone">&nbsp;</i>' + v.company_number);
                    $(`#company_email`).text(v.company_email);
                    $(`#company_name`).text(v.company_name);
                    $(`#company_name`).text(v.company_name);

                })
                $('#loading-spinner').css('display', 'none');


            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>