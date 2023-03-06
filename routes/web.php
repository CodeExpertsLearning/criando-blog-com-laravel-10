<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Vc acessa uma rul 127.0.0.1:8000/posts -> index(Front Ctrl)
// -> procurar isso no route collection -> quando acha, ele executa o callback
//-> o resultado do callback daquela rota é retornado como reposta...

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{post}', function ($post) {
    return view('posts.post', ['post' => $post]);
});

//Rotas do Laravel Breeze - Que nos Entrega um Admin Inicial
//Com login, registro, dashboard e reset de senha...
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
