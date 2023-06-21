<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
      <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
        rel="stylesheet"
      />
      <link 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
      rel="stylesheet" />
        <!-- Styles -->
        <style>
            body {
                font-family: Roboto, Helvetica, Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <navbar-vue></navbar-vue>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
           