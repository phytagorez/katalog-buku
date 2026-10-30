@extends('layouts.app')

@section('title', 'Data Karyawan & Staf')

@section('content')
<div class="space-y-8">

    <!-- Top Hero Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pb-2">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium bg-sky-100/80 text-sky-800 border border-sky-200 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Manajemen Personalia</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900">
                Data <span class="text-sky-600">Karyawan</span>
            </h1>
            <p class="text-sm text-slate-600 mt-1 max-w-2xl">
                Kelola daftar staf, petugas sirkulasi, dan administrator perpustakaan dengan mudah.
            </p>
        </div>

        <!-- Add Button -->
        <div class="flex items-center gap-3">
            <button type="button" onclick="openAddKaryawanModal()"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/25 transition-all duration-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>Tambah Karyawan</span>
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Karyawan</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['total_karyawan'] }}</span>
                <span class="text-xs font-medium text-slate-500">Orang Staf</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Koleksi Terkelola</span>
                <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $stats['total_books'] }}</span>
                <a href="{{ route('books.index') }}" class="text-xs font-medium text-sky-600 hover:underline">Buka Katalog &rarr;</a>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-sky-100 shadow-sm sm:col-span-2 lg:col-span-1">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Status Database</span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Sinkron
                </span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-sm font-semibold text-slate-700">Tabel: karyawans</span>
                <span class="text-xs text-slate-400">(PK: id_karyawan)</span>
            </div>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 rounded-2xl border border-sky-100 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
        <form method="GET" action="{{ route('karyawans.index') }}" class="w-full flex items-center gap-2">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ $search }}"
                       placeholder="Cari karyawan berdasarkan nama atau alamat..."
                       class="w-full pl-10 pr-10 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                @if ($search)
                    <a href="{{ route('karyawans.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>
            <button type="submit" class="px-4 py-2.5 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 text-sm font-medium hover:bg-sky-100 transition-colors">
                Cari
            </button>
        </form>
    </div>

    <!-- Active Filter Notice -->
    @if ($search)
        <div class="flex items-center justify-between bg-sky-50 border border-sky-200 px-4 py-2.5 rounded-xl text-sm text-sky-900">
            <span>Hasil pencarian untuk: <strong>"{{ $search }}"</strong> ({{ $karyawan->count() }} staf ditemukan)</span>
            <a href="{{ route('karyawans.index') }}" class="text-xs font-semibold text-sky-700 hover:underline">
                Hapus Filter &times;
            </a>
        </div>
    @endif

    <!-- Data Table Card -->
    <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-sky-50/70 border-b border-sky-100 text-[11px] font-bold uppercase tracking-wider text-sky-800">
                        <th class="py-3.5 px-4 w-12 text-center">No</th>
                        <th class="py-3.5 px-4">Nama Staf</th>
                        <th class="py-3.5 px-4">Alamat Domisili</th>
                        <th class="py-3.5 px-4 w-32">Kode ID</th>
                        <th class="py-3.5 px-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse ($karyawan as $k)
                        <tr class="hover:bg-sky-50/40 transition-colors">
                            <td class="py-4 px-4 text-center font-medium text-slate-400">
                                {{ $loop->iteration }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-sky-600 to-sky-400 text-white font-semibold text-xs flex items-center justify-center shadow-xs">
                                        {{ strtoupper(substr($k->nama, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">{{ $k->nama }}</div>
                                        <span class="text-[11px] text-slate-400">Petugas Perpustakaan</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-1.5 text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-sky-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="line-clamp-1">{{ $k->alamat }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-mono font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                    EMP-{{ str_pad($k->id_karyawan, 3, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <button type="button"
                                            onclick="openEditKaryawanModal({{ $k->id_karyawan }}, '{{ addslashes($k->nama) }}', '{{ addslashes($k->alamat) }}')"
                                            class="p-1.5 rounded-lg text-sky-600 hover:bg-sky-50 transition-colors" title="Edit Karyawan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button type="button"
                                            onclick="openDeleteKaryawanModal({{ $k->id_karyawan }}, '{{ addslashes($k->nama) }}')"
                                            class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors" title="Hapus Karyawan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="max-w-xs mx-auto">
                                    <div class="w-12 h-12 mx-auto rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-800">Tidak ada data karyawan</h4>
                                    <p class="text-xs text-slate-500 mt-1">Data staf belum tersedia atau tidak cocok dengan pencarian.</p>
                                    <button type="button" onclick="openAddKaryawanModal()" class="mt-4 px-4 py-2 rounded-xl bg-sky-600 text-white text-xs font-semibold hover:bg-sky-500 transition-colors cursor-pointer">
                                        + Tambah Staf Baru
                                    </button>
                                </div>
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
<!-- MODAL: TAMBAH KARYAWAN -->
<div id="modal-add-karyawan" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeAddKaryawanModal()"></div>

        <!-- Modal Dialog Box -->
        <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 text-left shadow-2xl border border-sky-100 transition-all z-10 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Tambah Karyawan Baru</h3>
                        <p class="text-xs text-slate-500">Daftarkan staf atau pengelola perpustakaan baru.</p>
                    </div>
                </div>
                <button type="button" onclick="closeAddKaryawanModal()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('karyawans.store') }}" class="mt-5 space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                           placeholder="Contoh: Ahmad Fauzi"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat Lengkap <span class="text-rose-500">*</span></label>
                    <textarea name="alamat" rows="3" required
                              placeholder="Contoh: Jl. Kalimantan No. 37, Sumbersari, Jember"
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">{{ old('alamat') }}</textarea>
                </div>

                <div class="pt-4 flex items-center justify-end gap-2.5 border-t border-slate-100">
                    <button type="button" onclick="closeAddKaryawanModal()"
                            class="px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/20 transition-all cursor-pointer">
                        Simpan Data Staf
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODAL: EDIT KARYAWAN -->
<div id="modal-edit-karyawan" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeEditKaryawanModal()"></div>

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
                        <h3 class="text-base font-bold text-slate-900">Perbarui Data Karyawan</h3>
                        <p class="text-xs text-slate-500">Edit informasi nama atau alamat karyawan.</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditKaryawanModal()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="form-edit-karyawan" method="POST" action="" class="mt-5 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" id="edit-karyawan-nama" name="nama" required
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat Lengkap <span class="text-rose-500">*</span></label>
                    <textarea id="edit-karyawan-alamat" name="alamat" rows="3" required
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all"></textarea>
                </div>

                <div class="pt-4 flex items-center justify-end gap-2.5 border-t border-slate-100">
                    <button type="button" onclick="closeEditKaryawanModal()"
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

<!-- MODAL: HAPUS KARYAWAN -->
<div id="modal-delete-karyawan" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="min-h-screen px-4 text-center flex items-center justify-center">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeDeleteKaryawanModal()"></div>

        <!-- Modal Dialog Box -->
        <div class="relative bg-white rounded-3xl max-w-md w-full p-6 text-left shadow-2xl border border-rose-100 transition-all z-10 animate-in fade-in zoom-in-95 duration-200">
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Hapus Data Karyawan?</h3>
                    <p class="text-xs text-slate-500">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-600">
                Apakah Anda yakin ingin menghapus data staf <strong id="delete-karyawan-nama" class="text-slate-900"></strong>?
            </p>

            <form id="form-delete-karyawan" method="POST" action="" class="mt-6 flex items-center justify-end gap-2.5">
                @csrf
                @method('DELETE')

                <button type="button" onclick="closeDeleteKaryawanModal()"
                        class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2 rounded-xl text-xs font-semibold text-white bg-rose-600 hover:bg-rose-500 active:bg-rose-700 shadow-md shadow-rose-600/20 transition-all cursor-pointer">
                    Hapus Staf
                </button>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openAddKaryawanModal() {
        document.getElementById('modal-add-karyawan').classList.remove('hidden');
    }
    function closeAddKaryawanModal() {
        document.getElementById('modal-add-karyawan').classList.add('hidden');
    }

    function openEditKaryawanModal(id, nama, alamat) {
        const form = document.getElementById('form-edit-karyawan');
        form.action = `/karyawans/${id}`;
        document.getElementById('edit-karyawan-nama').value = nama;
        document.getElementById('edit-karyawan-alamat').value = alamat;
        document.getElementById('modal-edit-karyawan').classList.remove('hidden');
    }
    function closeEditKaryawanModal() {
        document.getElementById('modal-edit-karyawan').classList.add('hidden');
    }

    function openDeleteKaryawanModal(id, nama) {
        const form = document.getElementById('form-delete-karyawan');
        form.action = `/karyawans/${id}`;
        document.getElementById('delete-karyawan-nama').innerText = `"${nama}"`;
        document.getElementById('modal-delete-karyawan').classList.remove('hidden');
    }
    function closeDeleteKaryawanModal() {
        document.getElementById('modal-delete-karyawan').classList.add('hidden');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddKaryawanModal();
            closeEditKaryawanModal();
            closeDeleteKaryawanModal();
        }
    });
</script>
@endpush
