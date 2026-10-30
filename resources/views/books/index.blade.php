@extends('layouts.app')

@section('title', 'Katalog Buku Perpustakaan')

@section('content')
<div class="space-y-8">

    <!-- Top Hero Section & Welcome -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pb-2">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium bg-sky-100/80 text-sky-800 border border-sky-200 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>Arsip Pustaka Terpadu</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">
                Katalog <span class="text-sky-600">Buku</span>
            </h1>
            <p class="text-sm text-slate-600 mt-1 max-w-2xl">
                Jelajahi, telusuri, dan kelola seluruh koleksi buku perpustakaan dengan cepat, rapi, dan responsif.
            </p>
        </div>

        <!-- Add Book Button -->
        <div class="flex items-center gap-3">
            <button type="button" onclick="openAddModal()"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/25 transition-all duration-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Buku</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stat 1: Total Books -->
        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm hover:border-sky-300 transition-all">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Koleksi</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['total_books'] }}</span>
                <span class="text-xs font-medium text-slate-500">Judul</span>
            </div>
        </div>

        <!-- Stat 2: Total Authors -->
        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm hover:border-sky-300 transition-all">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Penulis Unik</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['total_authors'] }}</span>
                <span class="text-xs font-medium text-slate-500">Penulis</span>
            </div>
        </div>

        <!-- Stat 3: Latest Year -->
        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm hover:border-sky-300 transition-all">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Rilis Terbaru</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['latest_year'] }}</span>
                <span class="text-xs font-medium text-slate-500">Tahun</span>
            </div>
        </div>

        <!-- Stat 4: Total Staff -->
        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm hover:border-sky-300 transition-all">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Staf Pengelola</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['total_karyawan'] }}</span>
                <a href="{{ route('karyawans.index') }}" class="text-xs font-medium text-sky-600 hover:underline">Kelola &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Search, Filter & View Controls -->
    <div class="bg-white p-4 rounded-2xl border border-sky-100 shadow-sm">
        <form method="GET" action="{{ route('books.index') }}" class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-3">
            
            <!-- Search Field -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ $search }}"
                       placeholder="Cari berdasarkan judul, penulis, atau tahun..."
                       class="w-full pl-10 pr-10 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                @if ($search)
                    <a href="{{ route('books.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>

            <!-- Sort Selector -->
            <div class="flex items-center gap-2">
                <select name="sort" onchange="this.form.submit()"
                        class="px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 cursor-pointer">
                    <option value="latest" {{ $sort === 'latest' ? 'selected' : '' }}>Terbaru Ditambahkan</option>
                    <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Terlama Ditambahkan</option>
                    <option value="title_asc" {{ $sort === 'title_asc' ? 'selected' : '' }}>Judul (A - Z)</option>
                    <option value="title_desc" {{ $sort === 'title_desc' ? 'selected' : '' }}>Judul (Z - A)</option>
                    <option value="year_desc" {{ $sort === 'year_desc' ? 'selected' : '' }}>Tahun Terbit (Terbaru)</option>
                    <option value="year_asc" {{ $sort === 'year_asc' ? 'selected' : '' }}>Tahun Terbit (Terlama)</option>
                </select>

                <button type="submit" class="px-4 py-2.5 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 text-sm font-medium hover:bg-sky-100 transition-colors">
                    Filter
                </button>
            </div>

            <!-- View Switcher (Grid / Table) -->
            <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                <button type="button" id="btn-view-grid" onclick="setViewMode('grid')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold flex items-center gap-1.5 transition-all bg-white text-sky-600 shadow-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Kartu</span>
                </button>
                <button type="button" id="btn-view-table" onclick="setViewMode('table')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold flex items-center gap-1.5 transition-all text-slate-600 hover:text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <span>Tabel</span>
                </button>
            </div>

        </form>
    </div>

    <!-- Active Search Filter Badge -->
    @if ($search)
        <div class="flex items-center justify-between bg-sky-50 border border-sky-200 px-4 py-2.5 rounded-xl text-sm text-sky-900">
            <div class="flex items-center gap-2">
                <span>Hasil pencarian untuk: <strong>"{{ $search }}"</strong> ({{ $books->count() }} buku ditemukan)</span>
            </div>
            <a href="{{ route('books.index') }}" class="text-xs font-semibold text-sky-700 hover:underline">
                Hapus Filter &times;
            </a>
        </div>
    @endif

    <!-- SECTION: GRID CARD VIEW -->
    <div id="grid-view-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($books as $book)
            <div class="group relative bg-white rounded-2xl border border-sky-100 shadow-sm hover:shadow-md hover:border-sky-300 transition-all duration-200 overflow-hidden flex flex-col justify-between">
                
                <!-- Book Card Header with Spine Accent -->
                <div class="relative p-5 pb-3">
                    <div class="flex items-start justify-between gap-3">
                        
                        <!-- Simulated Book Cover Badge -->
                        <div class="w-12 h-16 rounded-lg bg-gradient-to-tr from-sky-600 via-sky-500 to-sky-400 p-1.5 flex flex-col justify-between text-white shadow-sm shrink-0 group-hover:scale-105 transition-transform">
                            <span class="text-[9px] font-bold uppercase tracking-wider opacity-90 truncate">{{ Str::limit($book->author, 8) }}</span>
                            <div class="w-full h-0.5 bg-white/40 rounded"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-80 self-end" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>

                        <!-- Year Badge -->
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-sky-50 text-sky-700 border border-sky-100">
                                {{ $book->tahun_terbit }}
                            </span>
                        </div>
                    </div>

                    <!-- Title & Author -->
                    <div class="mt-4">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-sky-600 transition-colors line-clamp-2" title="{{ $book->title }}">
                            {{ $book->title }}
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-sky-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $book->author }}</span>
                        </p>
                    </div>
                </div>

                <!-- Card Footer Actions -->
                <div class="px-5 py-3.5 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-slate-400">ID: #BOK-{{ str_pad($book->id, 3, '0', STR_PAD_LEFT) }}</span>
                    <div class="flex items-center gap-1.5">
                        <button type="button"
                                onclick="openEditModal({{ $book->id }}, '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', {{ $book->tahun_terbit }})"
                                class="px-2.5 py-1.5 rounded-lg text-sky-700 hover:bg-sky-100 transition-colors font-medium cursor-pointer">
                            Edit
                        </button>
                        <button type="button"
                                onclick="openDeleteModal({{ $book->id }}, '{{ addslashes($book->title) }}')"
                                class="px-2.5 py-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors font-medium cursor-pointer">
                            Hapus
                        </button>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-sky-100 p-8 shadow-xs">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-sky-50 text-sky-500 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-800">Belum ada buku yang sesuai</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">
                    @if ($search)
                        Tidak ada buku dengan kata kunci "{{ $search }}". Coba cari kata kunci lain.
                    @else
                        Katalog perpustakaan masih kosong. Tambahkan buku pertama sekarang!
                    @endif
                </p>
                <div class="mt-5 flex justify-center gap-3">
                    @if ($search)
                        <a href="{{ route('books.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 text-xs font-semibold hover:bg-slate-200 transition-colors">
                            Reset Pencarian
                        </a>
                    @endif
                    <button type="button" onclick="openAddModal()" class="px-4 py-2 rounded-xl bg-sky-600 text-white text-xs font-semibold hover:bg-sky-500 transition-colors cursor-pointer">
                        + Tambah Buku Baru
                    </button>
                </div>
            </div>
        @endforelse
    </div>

    <!-- SECTION: TABLE VIEW (Hidden by default, toggled via JS) -->
    <div id="table-view-container" class="hidden bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-sky-50/70 border-b border-sky-100 text-[11px] font-bold uppercase tracking-wider text-sky-800">
                        <th class="py-3.5 px-4 w-12 text-center">No</th>
                        <th class="py-3.5 px-4">Judul Buku</th>
                        <th class="py-3.5 px-4">Penulis</th>
                        <th class="py-3.5 px-4 w-32">Tahun Terbit</th>
                        <th class="py-3.5 px-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse ($books as $book)
                        <tr class="hover:bg-sky-50/40 transition-colors">
                            <td class="py-3.5 px-4 text-center font-medium text-slate-400">
                                {{ $loop->iteration }}
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-slate-900">{{ $book->title }}</div>
                                <span class="text-[10px] text-slate-400">ID: #BOK-{{ str_pad($book->id, 3, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="py-3.5 px-4 font-medium text-slate-600">
                                {{ $book->author }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-sky-100 text-sky-800">
                                    {{ $book->tahun_terbit }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <button type="button"
                                            onclick="openEditModal({{ $book->id }}, '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', {{ $book->tahun_terbit }})"
                                            class="p-1.5 rounded-lg text-sky-600 hover:bg-sky-50 transition-colors" title="Edit Buku">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                            onclick="openDeleteModal({{ $book->id }}, '{{ addslashes($book->title) }}')"
                                            class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors" title="Hapus Buku">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                Tidak ada data buku ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('modals')
<!-- MODAL: TAMBAH BUKU -->
<div id="modal-add-book" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeAddModal()"></div>

        <!-- Modal Dialog Box -->
        <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 text-left shadow-2xl border border-sky-100 transition-all z-10 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Tambah Buku Baru</h3>
                        <p class="text-xs text-slate-500">Lengkapi informasi buku ke dalam katalog.</p>
                    </div>
                </div>
                <button type="button" onclick="closeAddModal()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form Tambah Buku -->
            <form method="POST" action="{{ route('books.store') }}" class="mt-5 space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Buku <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           placeholder="Contoh: Filosofi Teras"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Penulis <span class="text-rose-500">*</span></label>
                    <input type="text" name="author" value="{{ old('author') }}" required
                           placeholder="Contoh: Henry Manampiring"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Tahun Terbit <span class="text-rose-500">*</span></label>
                    <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', date('Y')) }}" min="1800" max="{{ date('Y') + 1 }}" required
                           placeholder="Contoh: 2018"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                    <span class="text-[11px] text-slate-400 mt-1 block">Tahun minimal 1800 sampai tahun mendatang.</span>
                </div>

                <div class="pt-4 flex items-center justify-end gap-2.5 border-t border-slate-100">
                    <button type="button" onclick="closeAddModal()"
                            class="px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/20 transition-all cursor-pointer">
                        Simpan ke Katalog
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODAL: EDIT BUKU -->
<div id="modal-edit-book" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeEditModal()"></div>

        <!-- Modal Dialog Box -->
        <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 text-left shadow-2xl border border-sky-100 transition-all z-10 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Perbarui Data Buku</h3>
                        <p class="text-xs text-slate-500">Edit detail judul, penulis, atau tahun terbit.</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form Edit Buku -->
            <form id="form-edit-book" method="POST" action="" class="mt-5 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul Buku <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit-title" name="title" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Penulis <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit-author" name="author" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Tahun Terbit <span class="text-rose-500">*</span></label>
                    <input type="number" id="edit-tahun" name="tahun_terbit" min="1800" max="{{ date('Y') + 1 }}" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div class="pt-4 flex items-center justify-end gap-2.5 border-t border-slate-100">
                    <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/20 transition-all cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODAL: HAPUS BUKU -->
<div id="modal-delete-book" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeDeleteModal()"></div>

        <!-- Modal Dialog Box -->
        <div class="relative bg-white rounded-3xl max-w-md w-full p-6 text-left shadow-2xl border border-rose-100 transition-all z-10 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Hapus Buku?</h3>
                    <p class="text-xs text-slate-500">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-600">
                Apakah Anda yakin ingin menghapus buku <strong id="delete-book-title" class="text-slate-900"></strong> dari katalog?
            </p>

            <form id="form-delete-book" method="POST" action="" class="mt-6 flex items-center justify-end gap-2.5">
                @csrf
                @method('DELETE')

                <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2 rounded-xl text-xs font-semibold text-white bg-rose-600 hover:bg-rose-500 active:bg-rose-700 shadow-md shadow-rose-600/20 transition-all cursor-pointer">
                    Hapus Sekarang
                </button>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // View Switcher logic (Grid vs Table)
    function setViewMode(mode) {
        const grid = document.getElementById('grid-view-container');
        const table = document.getElementById('table-view-container');
        const btnGrid = document.getElementById('btn-view-grid');
        const btnTable = document.getElementById('btn-view-table');

        if (mode === 'table') {
            grid.classList.add('hidden');
            table.classList.remove('hidden');
            btnTable.classList.add('bg-white', 'text-sky-600', 'shadow-xs');
            btnTable.classList.remove('text-slate-600');
            btnGrid.classList.remove('bg-white', 'text-sky-600', 'shadow-xs');
            btnGrid.classList.add('text-slate-600');
            localStorage.setItem('katalog_view_mode', 'table');
        } else {
            table.classList.add('hidden');
            grid.classList.remove('hidden');
            btnGrid.classList.add('bg-white', 'text-sky-600', 'shadow-xs');
            btnGrid.classList.remove('text-slate-600');
            btnTable.classList.remove('bg-white', 'text-sky-600', 'shadow-xs');
            btnTable.classList.add('text-slate-600');
            localStorage.setItem('katalog_view_mode', 'grid');
        }
    }

    // Restore user view preference
    document.addEventListener('DOMContentLoaded', function() {
        const savedMode = localStorage.getItem('katalog_view_mode');
        if (savedMode === 'table') {
            setViewMode('table');
        }
    });

    // Add Modal
    function openAddModal() {
        document.getElementById('modal-add-book').classList.remove('hidden');
    }
    function closeAddModal() {
        document.getElementById('modal-add-book').classList.add('hidden');
    }

    // Edit Modal
    function openEditModal(id, title, author, year) {
        const form = document.getElementById('form-edit-book');
        form.action = `/books/${id}`;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-author').value = author;
        document.getElementById('edit-tahun').value = year;
        document.getElementById('modal-edit-book').classList.remove('hidden');
    }
    function closeEditModal() {
        document.getElementById('modal-edit-book').classList.add('hidden');
    }

    // Delete Modal
    function openDeleteModal(id, title) {
        const form = document.getElementById('form-delete-book');
        form.action = `/books/${id}`;
        document.getElementById('delete-book-title').innerText = `"${title}"`;
        document.getElementById('modal-delete-book').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('modal-delete-book').classList.add('hidden');
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddModal();
            closeEditModal();
            closeDeleteModal();
        }
    });
</script>
@endpush