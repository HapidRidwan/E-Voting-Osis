<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Voting OSIS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Content -->
    <main class="sm:ml-64 min-h-screen">

        <!-- Isi Halaman -->
        <section class="p-8">

            @yield('content')

        </section>

    </main>
    @stack('scripts')

</body>

</html>