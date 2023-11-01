<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Foundation\Console\AboutCommand;
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

Route::get('/', [HomeController::class, 'home'] )->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/single', AboutController::class);

Route::resource('posts', PostsController::class);

// Route::get('/posts', function() use($posts){
//     // dd(request()->all());
//     dd((int)request()->input('page',1));
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id}', function($id) use($posts){

//     abort_if(!isset($posts[$id]), 404);
    

//     return view('posts.show', ['post' => $posts[$id]]);
// })
// // ->where([
// //     'id' => '[0-9]+'
// // ])
// ->name('posts.show');

// Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20){
//     return 'Posts from ' . $daysAgo . ' days';
// })->name('posts.recent.index');


$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Intro to Programming',
        'content' => 'This is a short intro to Programming',
        'is_new' => false
    ]
];

Route::prefix('/fun')->name('fun.')->group(function() use($posts) {

    
    Route::get('responses', function() use($posts){
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Tiberi Zota', 3600);
    })->name('responses');
    
    Route::get('back', function() {
        return back();
    })->name('back');
    
    Route::get('named-route', function() {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');
    
    Route::get('away', function() {
        return redirect()->away('https://google.com');
    })->name('away');
    
    Route::get('json', function() use($posts){
        return response()->json($posts);
    })->name('json');
    
    Route::get('download', function() use($posts){
        return response()->download(public_path('/imagine.jpg'), 'desc.jpg');
    })->name('download');

});
