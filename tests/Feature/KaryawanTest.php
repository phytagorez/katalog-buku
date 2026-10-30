<?php

use App\Models\Karyawan;

test('can display karyawans page', function () {
    Karyawan::factory()->create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Jl. Merdeka No. 10',
    ]);

    $response = $this->get(route('karyawans.index'));

    $response->assertStatus(200);
    $response->assertSee('Budi Santoso');
    $response->assertSee('Jl. Merdeka No. 10');
});

test('can display create karyawan page', function () {
    $response = $this->get(route('karyawans.create'));

    $response->assertStatus(200);
});

test('can store a new karyawan', function () {
    $response = $this->post(route('karyawans.store'), [
        'nama' => 'Siti Rahma',
        'alamat' => 'Jl. Sudirman No. 45',
    ]);

    $response->assertRedirect(route('karyawans.index'));
    $this->assertDatabaseHas('karyawans', [
        'nama' => 'Siti Rahma',
        'alamat' => 'Jl. Sudirman No. 45',
    ]);
});

test('validates karyawan creation', function () {
    $response = $this->post(route('karyawans.store'), []);

    $response->assertSessionHasErrors(['nama', 'alamat']);
});

test('can update a karyawan', function () {
    $karyawan = Karyawan::factory()->create([
        'nama' => 'Ahmad Dani',
        'alamat' => 'Jl. Lama No. 1',
    ]);

    $response = $this->put(route('karyawans.update', $karyawan), [
        'nama' => 'Ahmad Dhani Baru',
        'alamat' => 'Jl. Baru No. 99',
    ]);

    $response->assertRedirect(route('karyawans.index'));
    $this->assertDatabaseHas('karyawans', [
        'id_karyawan' => $karyawan->id_karyawan,
        'nama' => 'Ahmad Dhani Baru',
        'alamat' => 'Jl. Baru No. 99',
    ]);
});

test('can delete a karyawan', function () {
    $karyawan = Karyawan::factory()->create();

    $response = $this->delete(route('karyawans.destroy', $karyawan));

    $response->assertRedirect(route('karyawans.index'));
    $this->assertDatabaseMissing('karyawans', [
        'id_karyawan' => $karyawan->id_karyawan,
    ]);
});
