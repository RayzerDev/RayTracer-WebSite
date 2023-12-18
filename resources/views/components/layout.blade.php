<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/scss/app.scss'])
</head>
<body>
<div class="container py-4 px-3 mx-auto text-white">
    {{$slot}}
</div>
</body>
</html>
