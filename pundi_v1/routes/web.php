<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication
Auth::routes();

Route::get('/', 'WelcomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tentang-kami', function () {
    return view('pages.tentangKami');
});

Route::get('/disclaimer', function () {
    return view('pages.disclaimer');
});

Route::get('/redaksi', function () {
    return view('pages.redaksi');
});

Route::get('/media-siber', function () {
    return view('pages.mediaSaber');
});

Route::get('/ketentuan-tulisan', function () {
    return view('pages.ketentuanTulisan');
});

// Other Profile User
Route::get('profil/{name}', 'Profiles\ProfileOtherUserController@index')->name('other-user');

// Search
Route::get('cari', 'SearchController@index')->name('search');

Route::get('konsultasi', 'ConsultationController@index')->name('consultation');
Route::post('konsultasi/send', 'ConsultationController@consultation')->name('consultation.send');
Route::post('pertanyaan/send', 'ConsultationController@question')->name('question.send');

Route::namespace('Category')->group(function () {
    // Category
    Route::get('kategori/{n_category}', 'CategoryController@index')->name('category');
    // Sub Category
    Route::get('sub-kategori/{n_sub_category}', 'SubCategoryController@index')->name('sub-category');
});

// Article
Route::namespace('Articles')->group(function () {
    Route::get('artikel/{slug}', 'ArticleController@index')->name('article');
    // Comment 
    Route::prefix('comment')->name('comment.')->group(function () {
        Route::post('save-comment', 'CommentController@saveComment')->name('saveComment');
        Route::post('save-sub-comment', 'CommentController@saveSubComment')->name('saveSubComment');
        Route::get('delete-comment/{id}', 'CommentController@deleteComment')->name('deleteComment');
        Route::get('delete-sub-comment/{id}', 'CommentController@deleteSubComment')->name('deleteSubComment');
    });
    // Tag
    Route::get('artikel/tag/{tag}', 'TagController@index')->name('tag.index');
});

Route::group(['middleware' => ['auth']], function () {
    // Profil
    Route::namespace('Profiles')->group(function () {
        Route::get('profile', 'ProfileController@index')->name('profil');
        Route::get('profile/edit', 'ProfileController@edit')->name('profil.edit');
        Route::post('profile/update', 'ProfileController@update')->name('profil.update');
    });
    // Article
    Route::namespace('Articles')->name('article.')->group(function () {
        Route::resource('post', 'PostArticleController');
        Route::get('post/subCategoryByCategory/{id}', 'PostArticleController@subCategoryByCategory')->name('post.subCategoryByCategory');
    });
});
