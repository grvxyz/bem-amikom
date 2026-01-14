<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BEM AMIKOM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="bg-gray-100 text-gray-800">

<x-public.header />

<main>
    @yield('content')
</main>

<x-public.footer />

</body>
</html>
