@extends('layouts.app')

@section('title', 'Tambah Karyawan Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Breadcrumb & Navigation -->
    <div class="flex items-center gap-2 text-xs text-slate-500">
        <a href="{{ route('karyawans.index') }}" class="hover:text-sky-600 transition-colors">Data Karyawan</a>
        <span>&rsaquo;</span>
        <span class="text-slate-800 font-semibold">Tambah Staf</span>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-sky-100 shadow-sm p-6 sm:p-8">
        <div class="flex items-center gap-3.5 pb-5 border-b border-slate-100 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-600 to-sky-400 text-white flex items-center justify-center shadow-md shadow-sky-500/20 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">Tambah Data Karyawan</h1>
                <p class="text-xs text-slate-500 mt-0.5">Daftarkan personel baru ke dalam manajemen staf perpustakaan.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('karyawans.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-2">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                       placeholder="Contoh: Muhammad Ihsan"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all @error('nama') border-rose-300 ring-2 ring-rose-500/10 @enderror">
                @error('nama')
                    <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block text-xs font-semibold text-slate-700 mb-2">
                    Alamat Domisili <span class="text-rose-500">*</span>
                </label>
                <textarea id="alamat" name="alamat" rows="4" required
                          placeholder="Contoh: Jl. Diponegoro No. 12, Kel. Kepatihan, Banyuwangi"
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all @error('alamat') border-rose-300 ring-2 ring-rose-500/10 @enderror">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="{{ route('karyawans.index') }}"
                   class="px-5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl text-xs font-semibold text-white bg-sky-600 hover:bg-sky-500 active:bg-sky-700 shadow-md shadow-sky-600/25 transition-all cursor-pointer">
                    Simpan Data Karyawan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
