<!DOCTYPE html>
<html>
<!-- banhhh tolong -->
<head>
    <!-- local -->
    <title>Let the good times roll!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('landing.support.header.header_comp')
    @include('landing.admin.chart')
    @include('landing.support.footer.footer')
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</html>
