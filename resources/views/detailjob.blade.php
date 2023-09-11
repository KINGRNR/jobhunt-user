<!DOCTYPE html>
<html>
<!-- banhhh tolong -->
<head>
    <!-- local -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('landing.support.header.header')
    @include('detailjob.hero')
    @include('detailjob.detail')
    @include('detailjob.description')
    @include('detailjob.map')
    @include('landing.support.footer.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</html>