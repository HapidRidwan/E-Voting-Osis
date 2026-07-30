<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div
        class="min-h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('images/bg-login.png') }}');">

        <!-- Overlay -->
        <div class="min-h-screen bg-black/50 flex flex-col items-center justify-center px-4 py-10">

            <!-- Logo -->
            <div class="mb-8 text-center">
                <x-application-logo class="mx-auto w-24 h-24 md:w-32 md:h-32 lg:w-36 lg:h-36" />

                <h1 class="mt-4 text-2xl md:text-4xl font-bold text-white">
                    E-VOTING OSIS
                </h1>

                <p class="mt-2 text-sm md:text-base text-white/90">
                    SMK Informatika Sumedang
                </p>
            </div>

            <div
                class="w-full max-w-md
                       bg-white rounded-3xl shadow-2xl
                       px-8 py-12">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>
</html>