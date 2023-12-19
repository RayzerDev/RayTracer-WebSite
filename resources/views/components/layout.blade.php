<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$titre}}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/scss/app.scss'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="mb-5">
<x-banner></x-banner>
<div class="container py-4 px-3 mx-auto text-white">
    {{$slot}}
</div>
</body>
</html>
