<section
    class="bg-[url(https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg)] bg-center bg-cover h-72">
    <div class="bg-black bg-opacity-50 h-72">
        <div class="container flex flex-col justify-center p-6 mx-auto lg:justify-between">
            <div class="flex flex-col justify-center p-6 rounded-sm md:max-w-md xl:max-w-lg md:text-left mt-4 mb-20">
            </div>
            <div class="flex justify-between">
                <div>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-figma-biru-300 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">
                        <i class="fa fa-arrow-left"></i>&nbsp;Back to Menu
                    </button>
                </div>
                <div class="flex justify-center z-40" id="photo_profile">
                    <img class="object-cover rounded-full w-[222px] h-[222px]"
                        src="https://hbr.org/resources/images/article_assets/2020/03/Mar20_12_115049941.jpg"
                        alt="image photo profile">
                </div>
                <div class="">
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-white bg-figma-biru-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 border-2 border-figma-biru-300 text-sm font-medium px-5 py-2.5 focus:z-10 w-44 mt-36">
                        Edit Data&nbsp;<i class="fa fa-pencil"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="mx-5 mt-36 mb-5 border border-1 border-black">
<p class="container mx-auto my-5 font-semibold text-xl">User Detail</p>
<hr class="mx-5 my-5 border border-1 border-black">
<div class="container mx-auto my-12 grid grid-cols-1">
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Full Name</p>
        <p class="col-span-5 fullname">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Username</p>
        <p class="col-span-5" id="username">-</p>
        
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Email</p>
        <div class="flex items-center col-span-5">
            <p class="mr-2" id="email">-</p>
            <div class="google_badge">
                
            </div>
        </div>
    </div>
    
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Password</p>
        <p class="col-span-5">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Gender</p>
        <p class="col-span-5 gender">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Phone Number</p>
        <p class="col-span-5" id="phone">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Address</p>
        <p class="col-span-5 address">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Region</p>
        <p class="col-span-5" id="region">-</p>
    </div>
</div>
<hr class="mx-5 my-5 border border-1 border-black">
<p class="container mx-auto mx-5 my-5 font-semibold text-xl">Skill Detail</p>
<hr class="mx-5 my-5 border border-1 border-black">
<div id="alert-resume-profile"
    class="hidden container mx-auto flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        Buat <a href="/resume" class="font-semibold underline hover:no-underline">resume</a> untuk melengkapi Profil
        anda.
    </div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-resume-profile" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
<div class="container mx-auto mx-5 my-12 grid grid-cols-1" id="detailed_skill">
    {{-- <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Qualification</p>
        <p class="col-span-5">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Skill</p>
        <p class="col-span-5">-</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Resume File</p>
        <a href="#" class="col-span-5 text-blue-600">-</a>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Portofolio</p>
        <a href="#" class="col-span-5 text-blue-600">-</a>
    </div> --}}
</div>

<script>
    APP_URL = "{{ getenv('APP_URL') }}/";

    $(() => {
        initUserDetail()
        initIntegrationResume()
    });
    initUserDetail = () => {
        $.ajax({
            url: '/userdata',
            type: 'GET',
            success: function(response) {
                var data = response.users[0]
                $('#username').text(data.username);
                $('#email').text(data.email);
                $('#phone').text(data.phone_num);
                $('#region').text(data.region);
                checkGoogleConnect(data);
            },
            error: function(error) {

            }
        });
    }

    checkGoogleConnect = (a) =>
    {
        
        if(a.google_id){
            // $('#email').addClass('text-green-600')
            badge_gog = `<span class="flex items-center bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 italic ">Connected with Google OAuth 2.0
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <g clip-path="url(#clip0_44_11106)">
            <path d="M9.00003 16.17L4.83003 12L3.41003 13.41L9.00003 19L21 6.99997L19.59 5.58997L9.00003 16.17Z" fill="#323232"/>
        </g>
        <defs>
            <clipPath id="clip0_44_11106">
                <rect width="24" height="24" fill="white"/>
            </clipPath>
        </defs>
    </svg>
</span>
`
            $('.google_badge').append(badge_gog)
        }
    }

    initIntegrationResume = () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '/resumeprev',
                type: 'GET',
                success: function(response) {
                    if (response.resume == '') {
                        $('#alert-resume-profile').removeClass('hidden');
                    } else {
                        var data = response.resume[0]
                        // var gender = data.resume_gender
                        if (data.resume_gender == 0) {
                            gender = "Perempuan";
                        } else {
                            gender = "Laki-Laki"
                        }
                        $('.fullname').text(data.resume_fullname)
                        $('.gender').text(gender);
                        $('.address').text(data.resume_address);
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
                        $('#photo_profile').html(`<img class="object-cover rounded-full w-[222px] h-[222px]"
                        src="${APP_URL +'file/user_photo/'+ data.resume_official_photo }"
                        alt="image photo profile">`);
                        var html = `<div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Qualification</p>
        <p class="col-span-5">${lulusan}</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Skill</p>
        <p class="col-span-5">${data.resume_skill}</p>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Resume File</p>
        <a href="/file/company/${data.resume_file}" class="col-span-5 text-blue-600" download>Click to Download</a>
    </div>
    <div class="mb-4 grid grid-cols-6 gap-4">
        <p class="text-gray-500">Portofolio Link</p>
        <a href="${data.resume_portofolio_link}" class="col-span-5 text-blue-600">Click to Continue</a>
    </div>`;
                        $(`#detailed_skill`).html(html);

                    }
                    resolve();
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }
</script>
