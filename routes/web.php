<?php

use App\Http\Controllers\CourseController;
use App\Livewire\Autentikasi\LoginComponent;
use App\Livewire\Autentikasi\RegistrasiComponent;
use App\Livewire\Course\CoursePage;
use App\Livewire\Kategori\KategoriPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', LoginComponent::class)->name('login');
Route::get('/registrasi', RegistrasiComponent::class)->name('registrasi');
Route::post('/logout', function (Request $request) {
    Auth::logout();

    return redirect()->route('login');
})->name('logout');

Route::get('/kategori', KategoriPage::class);
Route::get('/course', CoursePage::class);
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
Route::post('course/upload', [CourseController::class, 'upload'])->name('course.upload');
