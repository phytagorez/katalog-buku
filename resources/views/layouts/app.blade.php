<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Katalog Buku') - PustakaLangit</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Fallback and custom Poppins rules */
        * {
            font-family: 'Poppins', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        /* Sky Blue Accent Utilities */
        .bg-sky-gradient {
            background: linear-gradient(135deg, #0284c7 0%, #0284c7 35%, #38bdf8 100%);
        }

        .bg-sky-surface {
            background: #ffffff;
            border: 1px solid #e0f2fe;
        }

        .sky-glass {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .sky-pill-active {
            background-color: #0284c7;
            color: #ffffff;
            box-shadow: 0 4px 14px -1px rgba(2, 132, 199, 0.35);
        }

        .sky-pill-inactive {
            color: #0369a1;
            background-color: #f0f9ff;
            border: 1px solid #e0f2fe;
        }

        .sky-pill-inactive:hover {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        /* Modal transitions */
        .modal-backdrop {
            transition: opacity 0.25s ease-out;
        }
        .modal-content {
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 flex flex-col antialiased selection:bg-sky-200 selection:text-sky-900">

    <!-- Top Sky Blue Atmospheric Glow -->
    <div class="fixed top-0 left-0 right-0 h-64 bg-gradient-to-b from-sky-100/60 via-sky-50/30 to-transparent pointer-events-none -z-10"></div>

    <!-- Header & Navigation Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-sky-100 shadow-sm transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Brand / Logo -->
                <div class="flex items-center gap-3.5">
                    <a href="{{ route('books.index') }}" class="group flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-sky-600 to-sky-400 flex items-center justify-center text-white shadow-md shadow-sky-500/25 group-hover:scale-105 transition-transform duration-200">
                            <!-- SVG Book Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xl font-bold tracking-tight text-slate-900 group-hover:text-sky-600 transition-colors">
                                Pustaka<span class="text-sky-600">Langit</span>
                            </span>
                            <span class="block text-xs font-medium text-slate-500">Katalog Buku & Staf Perpustakaan</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Tabs -->
                <nav class="flex items-center gap-2">
                    <a href="{{ route('books.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2 {{ request()->routeIs('books.*') || request()->routeIs('home') ? 'sky-pill-active' : 'sky-pill-inactive' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Katalog Buku</span>
                    </a>

                    <a href="{{ route('karyawans.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2 {{ request()->routeIs('karyawans.*') ? 'sky-pill-active' : 'sky-pill-inactive' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>Data Karyawan</span>
                    </a>
                </nav>

                <!-- Status indicator -->
                <div class="hidden md:flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Sistem Aktif
                    </span>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Flash Toast Notification -->
        @if (session('success'))
            <div id="flash-toast" class="mb-6 rounded-2xl bg-white border border-sky-200 p-4 shadow-lg shadow-sky-500/5 flex items-center justify-between gap-4 animate-in fade-in slide-in-from-top-4 duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-slate-900">Operasi Berhasil</h4>
                        <p class="text-xs text-slate-600">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" onclick="document.getElementById('flash-toast').remove()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl bg-rose-50 border border-rose-200 p-4 shadow-sm">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-rose-800">Terdapat kesalahan pada input Anda:</h4>
                        <ul class="mt-1 list-disc list-inside text-xs text-rose-700 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-sky-100 bg-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                <span>PustakaLangit &copy; {{ date('Y') }} &bull; Sistem Katalog Buku & Karyawan</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <span>Didesain dengan Tema Biru Langit &amp; Font Poppins</span>
            </div>
        </div>
    </footer>

    <!-- Modals Container -->
    @yield('modals')

    @stack('scripts')
</body>
</html>
