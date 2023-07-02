<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body>

    <section class="relative bg-[url(https://images.unsplash.com/photo-1572021335469-31706a17aaef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVvcGxlJTIwd29ya2luZ3xlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80)] bg-cover bg-center bg-no-repeat">
        <div class="bg-black bg-opacity-40">
            @include('support.header.header')
        <div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="text-white flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <span><svg class="absolute md:p-0 invisible lg:visible" width="218" height="200" viewBox="0 0 218 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M213 171.434V194.5H5V5.5H213V27.877" stroke="#FFDB89" stroke-width="10"/>
                    </svg></span><h1 class="mt-12 ml-8 font-poppins text-5xl font-bold leadi sm:text-5xl">Looking For
                    <span>Dream</span> Job?
                </h1>
                <p class="mt-20 mb-8 text-lg sm:mb-12">Dictum aliquam porta in condimentum ac integer
                    <br class="hidden md:inline lg:hidden">turpis pulvinar, est scelerisque ligula sem
                </p>
                <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start -mt-6">
                    <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-red-800 hover:duration-150 focus:ring-4 focus:outline-none font-medium text-sm px-4 py-2 text-center mr-3 md:mr-0"><i class="fa fa-users" aria-hidden="true"></i> &nbspJoin as a company</button>
                </div>
            </div>
        </div>
    </div>
    </section>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</html>
