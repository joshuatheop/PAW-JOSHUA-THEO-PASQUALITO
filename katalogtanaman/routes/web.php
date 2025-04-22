<?php

use App\Models\Plant;
use Illuminate\Support\Facades\Route;

// Menampilkan daftar tanaman (GET)
Route::get('/plants', function () {
    $plants = Plant::all(); // ambil semua data dari tabel
    return view('plants.index', compact('plants'));
});

// Menampilkan form untuk menambah tanaman (GET)
Route::get('/plants/create', function () {
    return view('plants.create');
})->name('plants.create');

// Menyimpan tanaman baru (POST)
Route::post('/plants', function () {
    request()->validate([
        'name' => 'required|string',
        'type' => 'required|string',
        'care_instructions' => 'required|string',
    ]);

    Plant::create([
        'name' => request('name'),
        'type' => request('type'),
        'care_instructions' => request('care_instructions'),
    ]);

    return redirect('/plants');
});
