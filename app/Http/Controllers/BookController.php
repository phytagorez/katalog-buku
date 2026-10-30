<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of books with search & stats.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->input('search', ''));
        $sort = (string) $request->input('sort', 'latest');

        $query = Book::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('tahun_terbit', 'like', "%{$search}%");
            });
        }

        match ($sort) {
            'oldest' => $query->orderBy('tahun_terbit', 'asc')->orderBy('id', 'asc'),
            'title_asc' => $query->orderBy('title', 'asc'),
            'title_desc' => $query->orderBy('title', 'desc'),
            'year_desc' => $query->orderBy('tahun_terbit', 'desc'),
            'year_asc' => $query->orderBy('tahun_terbit', 'asc'),
            default => $query->latest('id'),
        };

        $books = $query->get();

        $stats = [
            'total_books' => Book::count(),
            'total_authors' => Book::distinct('author')->count('author'),
            'latest_year' => Book::max('tahun_terbit') ?? date('Y'),
            'total_karyawan' => Karyawan::count(),
        ];

        return view('books.index', [
            'books' => $books,
            'search' => $search,
            'sort' => $sort,
            'stats' => $stats,
        ]);
    }

    /**
     * Store a newly created book.
     */
    public function store(Request $request): RedirectResponse
    {
        $currentYear = (int) date('Y') + 1;

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tahun_terbit' => "required|integer|min:1800|max:{$currentYear}",
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit minimal tahun 1800.',
            'tahun_terbit.max' => "Tahun terbit tidak boleh melebihi tahun {$currentYear}.",
        ]);

        $book = Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$book->title}\" berhasil ditambahkan ke katalog!");
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $currentYear = (int) date('Y') + 1;

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tahun_terbit' => "required|integer|min:1800|max:{$currentYear}",
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit minimal tahun 1800.',
            'tahun_terbit.max' => "Tahun terbit tidak boleh melebihi tahun {$currentYear}.",
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', "Data buku \"{$book->title}\" berhasil diperbarui!");
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $title = $book->title;
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$title}\" berhasil dihapus dari katalog.");
    }
}
