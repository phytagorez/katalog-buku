<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->input('search', ''));

        $query = Karyawan::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('id_karyawan', 'like', "%{$search}%");
            });
        }

        $karyawan = $query->orderBy('id_karyawan', 'asc')->get();

        $stats = [
            'total_karyawan' => Karyawan::count(),
            'total_books' => Book::count(),
        ];

        return view('karyawan.index', [
            'karyawan' => $karyawan,
            'search' => $search,
            'stats' => $stats,
        ]);
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create(): View
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created employee.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'nama.max' => 'Nama karyawan maksimal 255 karakter.',
            'alamat.required' => 'Alamat karyawan wajib diisi.',
            'alamat.max' => 'Alamat karyawan maksimal 500 karakter.',
        ]);

        $karyawan = Karyawan::create($validated);

        return redirect()->route('karyawans.index')
            ->with('success', "Data karyawan \"{$karyawan->nama}\" berhasil ditambahkan!");
    }

    /**
     * Show the form for editing an employee.
     */
    public function edit(Karyawan $karyawan): View
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(Request $request, Karyawan $karyawan): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'nama.max' => 'Nama karyawan maksimal 255 karakter.',
            'alamat.required' => 'Alamat karyawan wajib diisi.',
            'alamat.max' => 'Alamat karyawan maksimal 500 karakter.',
        ]);

        $karyawan->update($validated);

        return redirect()->route('karyawans.index')
            ->with('success', "Data karyawan \"{$karyawan->nama}\" berhasil diperbarui!");
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Karyawan $karyawan): RedirectResponse
    {
        $nama = $karyawan->nama;
        $karyawan->delete();

        return redirect()->route('karyawans.index')
            ->with('success', "Data karyawan \"{$nama}\" berhasil dihapus.");
    }
}
