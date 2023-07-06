<!DOCTYPE html>
<html>
<!-- banhhh tolong -->
<head>
    <!-- local -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('landing.support.header.header')
    @include('landing.hero')
    @include('landing.category')
    @include('landing.about')
    @include('landing.featured')
    @include('landing.resumecta')
    @include('landing.motivationcarousel')
    @include('landing.support.footer.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</html>
