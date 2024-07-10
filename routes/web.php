<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MediaController;
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

Route::get('/', function () {
    return view('welcome');
});

// beranda
Route::get('/beranda', [FrontendController::class, 'beranda'])->name('beranda');

// article berita
Route::get('/peta-wisata', [FrontendController::class, 'petawisata'])->name('peta-wisata');
Route::get('/berita', App\Http\Livewire\Berita\Index::class, 'berita')->name('list-berita');
Route::get('/berita/{slug}', App\Http\Livewire\Berita\Detail::class, 'getberita')->name('getberita');
Route::get('/id/{slug}', App\Http\Livewire\Destinasi\Category::class)->name('category');
Route::get('/id/{category}/post/{post}', App\Http\Livewire\Destinasi\DestinasiDetail::class)->name('detail-post');
Route::get('/event-festival', App\Http\Livewire\Event\EventList::class)->name('event-festival');
Route::get('/event-festival/{slug}', App\Http\Livewire\Event\EventDetail::class)->name('detail-event');
Route::get('/contact-us', App\Http\Livewire\ContactForm::class)->name('contact-us');
Route::get('/video-galery', App\Http\Livewire\VideoList::class)->name('video-galery');
Route::get('/dokumen-publikasi', App\Http\Livewire\Dokumen\Index::class)->name('dokumen-publikasi');
Route::get('/profile-dinas', App\Http\Livewire\ProfileDinas::class)->name('profile-dinas');
Route::get('/profile-dinas/{slug}', App\Http\Livewire\ProfilePage::class)->name('profile-page');

Route::get('/destinasi', function () {
    return view('destinasi');
});


Route::get('/page-404', function () {
    return view('page404');
});

Route::view('/forgot-password', 'auth.forgot-password')->name('forgot-password');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['role:admin|super-admin|author'], 'prefix' => 'admin'], function () {
        //dashboard
        Route::get('/dashboard', App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
        //ckeditor
        Route::post('/ckeditor/upload', [App\Http\Controllers\Controller::class, 'ckeditor_upload']);
        //profile
        Route::get('/profile', App\Http\Livewire\Admin\Profile::class)->name('admin.profile');
        //kategori destinasi index
        Route::get('/destinasi/kategori', App\Http\Livewire\Admin\Destinasi\Kategori\Index::class)->name('destinasi.kategori.index');
        //destinasi index
        Route::get('/destinasi', [AdminController::class, 'petawisata'])->name('destinasi.destinasi.index');
        Route::delete('/destinasi/{id}', [AdminController::class, 'delete'])->name('destinasi.destinasi.delete');
        Route::get('/destinasi/create', App\Http\Livewire\Admin\Destinasi\Destinasi\Create::class)->name('destinasi.destinasi.create');
        Route::get('/destinasi/edit/{id}', App\Http\Livewire\Admin\Destinasi\Destinasi\Edit::class)->name('destinasi.destinasi.edit');
        //berita index
        Route::get('/berita', App\Http\Livewire\Admin\Berita\Index::class)->name('berita.index');
        Route::get('/berita/create', App\Http\Livewire\Admin\Berita\Create::class)->name('berita.create');
        Route::get('/berita/edit/{id}', App\Http\Livewire\Admin\Berita\Edit::class)->name('berita.edit');
        //event index
        Route::get('/event-festival', App\Http\Livewire\Admin\Event\Index::class)->name('event.index');
        Route::get('/event-festival/create', App\Http\Livewire\Admin\Event\Create::class)->name('event.create');
        Route::get('/event-festival/edit/{id}', App\Http\Livewire\Admin\Event\Edit::class)->name('event.edit');
        //Page index
        Route::get('/pages', App\Http\Livewire\Admin\Pages\Index::class)->name('pages.index');
        Route::get('/pages/create', App\Http\Livewire\Admin\Pages\Create::class)->name('pages.create');
        Route::get('/pages/edit/{id}', App\Http\Livewire\Admin\Pages\Edit::class)->name('pages.edit');
        //Dokumen index
        Route::get('/dokumen', App\Http\Livewire\Admin\Dokumen\Index::class)->name('dokumen.index');

        //video index
        Route::get('/video', App\Http\Livewire\Admin\Video\Index::class)->name('video.index');
        Route::get('/video/create', App\Http\Livewire\Admin\Video\Create::class)->name('video.create');
        Route::get('/video/edit/{id}', App\Http\Livewire\Admin\Video\Edit::class)->name('video.edit');
        //image store controller
        Route::post('/destinasi/create', [MediaController::class, 'image_save'])->name("images.store");
        //kanban index
        Route::get('/kanban', App\Http\Livewire\Admin\Kanban\Index::class)->name('kanban.index');
        //User index
        Route::get('/users', App\Http\Livewire\Admin\Users\Index::class)->name('users.users.index');
        //Role index
        Route::get('/roles', App\Http\Livewire\Admin\Roles\Index::class)->name('users.roles.index');
        //Permission index
        Route::get('/permission', App\Http\Livewire\Admin\Permission\Index::class)->name('users.permission.index');
        //Inbox index
        Route::get('/inbox', App\Http\Livewire\Admin\Inbox\Index::class)->name('inbox.index');
        //Feed index
        Route::get('/user/feed', App\Http\Livewire\Admin\Feed\Index::class)->name('feed.index');
        //Inbox index
        Route::view('/settings', 'admin.settings')->name('settings');
    });

    Route::group(['middleware' => ['role:user|author'], 'prefix' => 'user'], function () {
        Route::get('/profile/{name}/{id}', App\Http\Livewire\User\Profile::class)->name('user.profile');
        Route::get('/profile/feed/{name}/{id}', App\Http\Livewire\User\Feed::class)->name('user.feed');
        Route::get('/profile/feed/{name}/{id}/create', App\Http\Livewire\User\Feedcreateorupdate::class)->name('user.feed.create');
        Route::get('/profile/feed/{name}/{users:id}/edit/{story:id}', App\Http\Livewire\User\Feedupdate::class)->name('user.feed.edit');
    });
});
