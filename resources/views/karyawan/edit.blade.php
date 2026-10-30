@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs text-slate-500">
        <a href="{{ route('karyawans.index') }}" class="hover:text-sky-600 transition-colors">Data Karyawan</a>
        <span>&rsaquo;</span>
        <span class="text-slate-800 font-semibold">Perbarui Data</span>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-sky-100 shadow-sm p-6 sm:p-8">
        <div class="flex items-center gap-3.5 pb-5 border-b border-slate-100 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-600 to-sky-400 text-white flex items-center justify-center shadow-md shadow-sky-500/20 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">Perbarui Data Karyawan</h1>
                <p class="text-xs text-slate-500 mt-0.5">Ubah informasi nama atau alamat karyawan ID: #EMP-{{ str_pad($karyawan->id_karyawan, 3, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('karyawans.update', $karyawan) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-2">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}" required
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
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all @error('alamat') border-rose-300 ring-2 ring-rose-500/10 @enderror">{{ old('alamat', $karyawan->alamat) }}</textarea>
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
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
