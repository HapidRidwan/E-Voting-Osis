<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voting Siswa</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex">

<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
      <a href="#" class="flex items-center ps-2.5 mb-5">
         <img src="{{ asset('images/logo.png') }}" class="h-6 me-3" alt="Flowbite Logo" />
         <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">E-Voting</span>
      </a>
      <ul class="space-y-1.5 font-medium">
         <!-- Dashboard -->
         <li>
            <a href="{{ route('student.dashboard') }}" class="flex items-center px-3 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('student.dashboard') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
               <svg class="w-5 h-5 shrink-0 transition duration-75 {{ request()->routeIs('student.dashboard') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

         <!-- Kandidat -->
         <li>
            <a href="{{ route('student.candidates') }}" class="flex items-center px-3 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('student.candidates') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
               <svg class="w-5 h-5 shrink-0 transition duration-75 {{ request()->routeIs('student.candidates') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
               <span class="ms-3">Kandidat</span>
            </a>
         </li>

         <!-- Bilik Voting -->
         <li>
            <a href="{{ route('vote.index') }}" class="flex items-center px-3 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('vote.index') ? 'bg-blue-600 text-white font-bold shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
               <svg class="w-5 h-5 shrink-0 transition duration-75 {{ request()->routeIs('vote.index') ? 'text-white' : 'text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
               <span class="ms-3">Bilik Voting</span>
            </a>
         </li>

         <!-- Visi & Misi -->
         <li>
            <a href="{{ route('student.vision') }}" class="flex items-center px-3 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('student.vision') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
               <svg class="w-5 h-5 shrink-0 transition duration-75 {{ request()->routeIs('student.vision') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
               <span class="ms-3">Visi & Misi</span>
            </a>
         </li>

         <!-- Status Voting -->
         <li>
            <a href="{{ route('student.status') }}" class="flex items-center px-3 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('student.status') ? 'bg-blue-50 text-blue-600 font-bold' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
               <svg class="w-5 h-5 shrink-0 transition duration-75 {{ request()->routeIs('student.status') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
               <span class="ms-3">Status Voting</span>
            </a>
         </li>

         <!-- Log out -->
         <li class="pt-4 border-t border-gray-100 mt-2">
            <form method="POST" action="{{ route('logout') }}">
               @csrf
               <button type="submit" class="w-full flex items-center px-3 py-2.5 text-red-600 rounded-xl hover:bg-red-50 transition duration-150 group">
                  <svg class="w-5 h-5 shrink-0 text-red-600 transition duration-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                  <span class="ms-3 text-left whitespace-nowrap font-medium">Log out</span>
               </button>
            </form>
         </li>
      </ul>
   </div>
</aside>

    <!-- Content -->
    <!-- DITAMBAHKAN: sm:ml-64 agar konten bergeser di desktop, dan pb-24 agar area bawah tidak tertutup nav mobile -->
    <main class="flex-1 sm:ml-64 pb-24 sm:pb-0">

        <header class="bg-white shadow px-6 py-4 flex justify-between items-center border-b border-gray-200">
            <div>
                <h2 class="font-bold text-xl text-gray-800">
                    @yield('title')
                </h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <h3 class="font-semibold text-sm text-gray-800">
                        {{ Auth::user()->name }}
                    </h3>
                    <p class="text-gray-500 text-xs">
                        {{ Auth::user()->kelas }} (Siswa)
                    </p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 text-xs font-semibold text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg border border-red-200 transition duration-200 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <section class="p-6">
            @yield('content')
        </section>

    </main>

</div>

<!-- Bottom Navigation Mobile -->
<div class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white/95 backdrop-blur-md border border-gray-200 rounded-full bottom-4 left-1/2 sm:hidden shadow-xl px-2">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto items-center">

        <!-- 1. Dashboard -->
        <a href="{{ route('student.dashboard') }}"
           class="inline-flex flex-col items-center justify-center py-1 rounded-s-full hover:bg-blue-50 group {{ request()->routeIs('student.dashboard') ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
            <svg class="w-5 h-5 mb-0.5 {{ request()->routeIs('student.dashboard') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="text-[10px] tracking-tight">Beranda</span>
        </a>

        <!-- 2. Kandidat -->
        <a href="{{ route('student.candidates') }}"
           class="inline-flex flex-col items-center justify-center py-1 hover:bg-blue-50 group {{ request()->routeIs('student.candidates') ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
            <svg class="w-5 h-5 mb-0.5 {{ request()->routeIs('student.candidates') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span class="text-[10px] tracking-tight">Kandidat</span>
        </a>

        <!-- 3. Vote (Tombol Utama Tengah) -->
        <div class="flex items-center justify-center">
            <a href="{{ route('vote.index') }}"
               class="inline-flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-md rounded-full w-10 h-10 transition transform hover:scale-105"
               title="Bilik Voting">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </a>
        </div>

        <!-- 4. Visi & Misi -->
        <a href="{{ route('student.vision') }}"
           class="inline-flex flex-col items-center justify-center py-1 hover:bg-blue-50 group {{ request()->routeIs('student.vision') ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
            <svg class="w-5 h-5 mb-0.5 {{ request()->routeIs('student.vision') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="text-[10px] tracking-tight">Visi Misi</span>
        </a>

        <!-- 5. Status Voting -->
        <a href="{{ route('student.status') }}"
           class="inline-flex flex-col items-center justify-center py-1 rounded-e-full hover:bg-blue-50 group {{ request()->routeIs('student.status') ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
            <svg class="w-5 h-5 mb-0.5 {{ request()->routeIs('student.status') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            <span class="text-[10px] tracking-tight">Status</span>
        </a>

    </div>
</div>

</body>
</html>