<?php

/**
 *
 *  MVC - Model -> View -> Controller
 *
 *   - Controller: Receber o dado da reqisição e delegar pro model ou passar pra uma view...
 *
 *   - View: Ela é a camada de interação, onde interagimos com o sistem ou pode
 * ser uma view de entrega de json para outro sistema...
 *
 *  - Model: O model processa ou contêm a regra de negócio, não necessariamente
 * é banco de dados apenas.
 */

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


//Vc acessa uma url 127.0.0.1:8000/posts -> index(Front Ctrl)
// -> procurar isso no route collection -> quando acha, ele executa o callback
//-> o resultado do callback daquela rota é retornado como reposta...




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/posts/{post}', [\App\Http\Controllers\HomeController::class, 'show']);


//Rotas admin posts

Route::prefix('/admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);

        // Route::prefix('/posts')
        //     ->name('posts.')
        //     ->controller(\App\Http\Controllers\Admin\PostsController::class)
        //     ->group(function () {
        //         Route::get('/', 'index')->name('index'); //apelido admin.posts.index
        //         Route::get('/create', 'create')->name('create');
        //         Route::post('/store', 'store')->name('store');

        //         Route::get('/{post}/edit', 'edit')->name('edit');
        //         Route::post('/{post}/edit', 'update')->name('update');

        //         Route::post('/{post}/destroy', 'destroy')->name('destroy');
        //     });

        /**
         *
         */

        //Controllers como recurso ou restfullcontrolelrs

        /**
         *
         * Post : GET, POST, PUT, PATCH, DELETE
         *
         *  GET /posts
         *  POST /posts
         *  PUT|PATCH /posts
         *  DELETE /posts
         */
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
