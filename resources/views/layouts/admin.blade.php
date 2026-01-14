<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin BEM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

{{-- SIDEBAR FIXED --}}
<x-admin.sidebar />

{{-- WRAPPER KONTEN --}}
<div class="ml-64 min-h-screen flex flex-col">

    {{-- HEADER --}}
    <x-admin.header />

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </main>

</div>

@stack('scripts')
</body>
</html>
