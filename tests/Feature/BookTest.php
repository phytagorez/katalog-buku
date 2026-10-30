<?php

use App\Models\Book;

test('can display books catalog page', function () {
    Book::factory()->create([
        'title' => 'Laskar Pelangi',
        'author' => 'Andrea Hirata',
        'tahun_terbit' => 2005,
    ]);

    $response = $this->get(route('books.index'));

    $response->assertStatus(200);
    $response->assertSee('Laskar Pelangi');
    $response->assertSee('Andrea Hirata');
});

test('can search books by title', function () {
    Book::factory()->create(['title' => 'Filosofi Teras']);
    Book::factory()->create(['title' => 'Negeri 5 Menara']);

    $response = $this->get(route('books.index', ['search' => 'Filosofi']));

    $response->assertStatus(200);
    $response->assertSee('Filosofi Teras');
});

test('can store a new book', function () {
    $response = $this->post(route('books.store'), [
        'title' => 'Bumi Manusia',
        'author' => 'Pramoedya Ananta Toer',
        'tahun_terbit' => 1980,
    ]);

    $response->assertRedirect(route('books.index'));
    $this->assertDatabaseHas('books', [
        'title' => 'Bumi Manusia',
        'author' => 'Pramoedya Ananta Toer',
        'tahun_terbit' => 1980,
    ]);
});

test('validates book creation', function () {
    $response = $this->post(route('books.store'), []);

    $response->assertSessionHasErrors(['title', 'author', 'tahun_terbit']);
});

test('can update a book', function () {
    $book = Book::factory()->create([
        'title' => 'Old Title',
        'author' => 'Old Author',
        'tahun_terbit' => 2000,
    ]);

    $response = $this->put(route('books.update', $book), [
        'title' => 'Updated Title',
        'author' => 'Updated Author',
        'tahun_terbit' => 2021,
    ]);

    $response->assertRedirect(route('books.index'));
    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'Updated Title',
        'author' => 'Updated Author',
        'tahun_terbit' => 2021,
    ]);
});

test('can delete a book', function () {
    $book = Book::factory()->create();

    $response = $this->delete(route('books.destroy', $book));

    $response->assertRedirect(route('books.index'));
    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});
