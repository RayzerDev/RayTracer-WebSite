<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/scss/app.scss'])
</head>
<body>
<div class="container py-4 px-3 mx-auto">
    <h1>Page d'accueil pour tester BootStrap</h1>
    <button class="btn btn-primary">Button de test</button>
</div>
</body>
</html>
