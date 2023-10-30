<script>
    var jobs = [];
    $(() => {
        init()
    });
    init = () => {
        loadcount();
    }
    redirectKategori = (button) => {
        const id = button.getAttribute('data-id');
        var params = [];
        switch (id) {
            case '1':
                params = "jbhnt-ti1cci"
                break;
            case '2':
                params = "jbhnt-ekjjh2";
                break;
            case '3':
                params = "jbhnt-TekIjkaa3";
                break;
            case '4':
                params = "jbhnt-SSjsj4";
                break;
            case '5':
                params = "jbhnt-pddknJsst5";
                break;
            case '6':
                params = "jbhnt-perTrav6";
                break;
            case '7':
                params = "jbhnt-FoBevarss7";
                break;
            case '8':
                params = "jbhnt-shwallss8";
                break;
            default:
                break;
        }
        location.href = '/category?id=' + params;
    }

    loadcount = () => {
        $.ajax({
            url: '/jobscount',
            type: 'GET',
            success: function(response) {

                response.jobCounts.forEach(function(item) {
                    const inputId = `kategori${item.job_category}`;

                    const inputElement = document.getElementById(inputId);
                    console.log(inputElement);
                    if (inputElement) {
                        if (item.count) {
                            inputElement.innerHTML = item.count + " Open Position";
                        } else {
                            inputElement.innerHTML = "No job available";
                        }
                    }

                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
