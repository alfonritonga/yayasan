<?php

use App\Http\Controllers\AboutImageController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MediaMateriController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspirationFigureController;
use App\Http\Controllers\LandingInfoController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerListController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('/welcome', function () {
    return view('blob');
});

Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
Route::post('/login', [AuthController::class, 'proccesslogin']);
Route::post('/', [AuthController::class, 'proccesslogin']);
Route::get('/logout', [AuthController::class, 'proccesslogout']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/donasi', [HomeController::class, 'donasi'])->name('landing_donasi');
Route::get('/program', [HomeController::class, 'program']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::get('/media-materi', [HomeController::class, 'media'])->name('media_materi');
Route::get('/lowongan-kerja', [HomeController::class, 'lowongan'])->name('lowongan');
Route::get('/lowongan-kerja/{guid}', [HomeController::class, 'lowonganDetail'])->name('lowongan_detail');
Route::get('/article/{slug}', [HomeController::class, 'articleDetail'])->name('article_detail');

Route::post('/subscription', [SubscriptionController::class, 'addPost']);
Route::post('/donations', [DonationController::class, 'addPost'])->name('donation_add_post');

Route::prefix('/ajax')->group(function () {
    Route::get('/partner-list/{partner_category}', [PartnerController::class, 'ajaxList'])->name('partner-category_view_lists');
});


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard_view');
    });
    Route::prefix('/media')->group(function () {
        Route::prefix('/photo')->group(function () {
            Route::get('/', [MediaMateriController::class, 'indexPhoto'])->name('photo_view_index');
            Route::get('/add', [MediaMateriController::class, 'addViewPhoto'])->name('photo_add_view');
            Route::post('/add', [MediaMateriController::class, 'addPostPhoto'])->name('photo_add_post');
            Route::get('/edit/{id}', [MediaMateriController::class, 'editViewPhoto'])->name('photo_edit_view');
            Route::post('/edit/{id}', [MediaMateriController::class, 'editPatchPhoto'])->name('photo_edit_patch');
            Route::delete('/{id}', [MediaMateriController::class, 'deletePhoto'])->name('photo_delete');
        });

        Route::prefix('/video')->group(function () {
            Route::get('/', [MediaMateriController::class, 'indexVideo'])->name('video_view_index');
            Route::get('/add', [MediaMateriController::class, 'addViewVideo'])->name('video_add_view');
            Route::post('/add', [MediaMateriController::class, 'addPostVideo'])->name('video_add_post');
            Route::get('/edit/{id}', [MediaMateriController::class, 'editViewVideo'])->name('video_edit_view');
            Route::post('/edit/{id}', [MediaMateriController::class, 'editPatchVideo'])->name('video_edit_patch');
            Route::delete('/{id}', [MediaMateriController::class, 'deleteVideo'])->name('video_delete');
        });

        Route::prefix('/article')->group(function () {
            Route::get('/', [ArticleController::class, 'index'])->name('article_view_index');
            Route::get('/add', [ArticleController::class, 'addView'])->name('article_add_view');
            Route::post('/add', [ArticleController::class, 'addPost'])->name('article_add_post');
            Route::get('/edit/{id}', [ArticleController::class, 'editView'])->name('article_edit_view');
            Route::post('/edit/{id}', [ArticleController::class, 'editPatch'])->name('article_edit_patch');
            Route::delete('/{id}', [ArticleController::class, 'delete'])->name('article_delete');
        });

        Route::prefix('/materi')->group(function () {
            Route::get('/', [MateriController::class, 'index'])->name('materi_view_index');
            Route::get('/add', [MateriController::class, 'addView'])->name('materi_add_view');
            Route::post('/add', [MateriController::class, 'addPost'])->name('materi_add_post');
            Route::get('/edit/{id}', [MateriController::class, 'editView'])->name('materi_edit_view');
            Route::post('/edit/{id}', [MateriController::class, 'editPatch'])->name('materi_edit_patch');
            Route::delete('/{id}', [MateriController::class, 'delete'])->name('materi_delete');
        });
    });

    Route::prefix('/description')->group(function () {
        Route::get('/', [LandingInfoController::class, 'descriptionView'])->name('description_view_index');
        Route::post('/', [LandingInfoController::class, 'descriptionPost'])->name('description_edit');
    });

    Route::prefix('/history')->group(function () {
        Route::get('/', [LandingInfoController::class, 'historyView'])->name('history_view_index');
        Route::post('/', [LandingInfoController::class, 'historyPost'])->name('history_edit');
    });

    Route::prefix('/visi-mission')->group(function () {
        Route::get('/', [LandingInfoController::class, 'visiMissionView'])->name('visi-mission_view_index');
        Route::post('/', [LandingInfoController::class, 'visiMissionPost'])->name('visi-mission_edit');
    });

    Route::prefix('/partnership')->group(function () {
        Route::get('/', [LandingInfoController::class, 'partnershipView'])->name('partnership_view_index');
        Route::post('/', [LandingInfoController::class, 'partnershipPost'])->name('partnership_edit');
    });

    Route::prefix('/donation')->group(function () {
        Route::get('/', [DonationController::class, 'index'])->name('donation_view_index');
    });

    Route::get('/subscribtion', [SubscriptionController::class, 'index'])->name('subscription_view_index');

    Route::prefix('/programs')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('program_view_index');
        Route::get('/add', [ProgramController::class, 'addView'])->name('program_view_add');
        Route::get('/edit/{id}', [ProgramController::class, 'editView'])->name('program_edit_view');
        Route::post('/', [ProgramController::class, 'addPost'])->name('program_add');
        Route::patch('/{id}', [ProgramController::class, 'editPatch'])->name('program_edit');
        Route::delete('/{id}', [ProgramController::class, 'delete'])->name('programw_delete');
    });

    Route::prefix('/about-image')->group(function () {
        Route::get('/', [AboutImageController::class, 'index'])->name('about-image_view_index');
        Route::get('/add', [AboutImageController::class, 'addView'])->name('about-image_add_view');
        Route::post('/add', [AboutImageController::class, 'addPost'])->name('about-image_add_post');
        Route::get('/edit/{id}', [AboutImageController::class, 'editView'])->name('about-image_edit_view');
        Route::post('/edit/{id}', [AboutImageController::class, 'editPatch'])->name('about-image_edit_patch');
        Route::delete('/{id}', [AboutImageController::class, 'delete'])->name('about-image_delete');
    });

    Route::prefix('/job')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('job_view_index');
        Route::get('/add', [JobController::class, 'addView'])->name('job_add_view');
        Route::post('/add', [JobController::class, 'addPost'])->name('job_add_post');
        Route::get('/edit/{id}', [JobController::class, 'editView'])->name('job_edit_view');
        Route::post('/edit/{id}', [JobController::class, 'editPatch'])->name('job_edit_patch');
        Route::delete('/{id}', [JobController::class, 'delete'])->name('job_delete');
    });

    Route::prefix('/inspiration-figure')->group(function () {
        Route::get('/', [InspirationFigureController::class, 'index'])->name('inspiration-figure_view_index');
        Route::get('/add', [InspirationFigureController::class, 'addView'])->name('inspiration-figure_add_view');
        Route::post('/add', [InspirationFigureController::class, 'addPost'])->name('inspiration-figure_add_post');
        Route::get('/edit/{id}', [InspirationFigureController::class, 'editView'])->name('inspiration-figure_edit_view');
        Route::post('/edit/{id}', [InspirationFigureController::class, 'editPatch'])->name('inspiration-figure_edit_patch');
        Route::delete('/{id}', [InspirationFigureController::class, 'delete'])->name('inspiration-figure_delete');
    });

    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin_view_index');
        Route::get('/add', [AdminController::class, 'addView'])->name('admin_add_view');
        Route::post('/add', [AdminController::class, 'addPost'])->name('admin_add_post');
        Route::get('/edit/{id}', [AdminController::class, 'editView'])->name('admin_edit_view');
        Route::post('/edit/{id}', [AdminController::class, 'editPatch'])->name('admin_edit_patch');
        Route::delete('/{id}', [AdminController::class, 'delete'])->name('admin_delete');
    });

    Route::prefix('/partner')->group(function () {
        Route::get('/category', [PartnerController::class, 'index'])->name('partner-category_view_index');
        Route::get('/category/add', [PartnerController::class, 'addView'])->name('partner-category_add_view');
        Route::get('/category/edit/{id}', [PartnerController::class, 'editView'])->name('partner-category_edit_view');
        Route::post('/category/add', [PartnerController::class, 'addPost'])->name('partner-category_add_post');
        Route::patch('/category/edit/{id}', [PartnerController::class, 'editPatch'])->name('partner-category_edit_patch');
        Route::delete('/category/{id}', [PartnerController::class, 'delete'])->name('partner-category_delete');

        Route::get('/list', [PartnerListController::class, 'index'])->name('partner-list_view_index');
        Route::get('/list/add', [PartnerListController::class, 'addView'])->name('partner-list_add_view');
        Route::get('/list/edit/{id}', [PartnerListController::class, 'editView'])->name('partner-list_edit_view');
        Route::post('/list/add', [PartnerListController::class, 'addPost'])->name('partner-list_add_post');
        Route::patch('/list/edit/{id}', [PartnerListController::class, 'editPatch'])->name('partner-list_edit_patch');
        Route::delete('/list/{id}', [PartnerController::class, 'delete'])->name('partner-list_delete');
    });

    Route::prefix('/achievement')->group(function () {
        Route::get('/', [AchievementController::class, 'index'])->name('achievement_view_index');
        Route::get('/add', [AchievementController::class, 'addView'])->name('achievement_add_view');
        Route::get('/edit/{id}', [AchievementController::class, 'editView'])->name('achievement_edit_view');
        Route::post('/', [AchievementController::class, 'addPost'])->name('achievement_add_post');
        Route::patch('/{id}', [AchievementController::class, 'editPatch'])->name('achievement_edit_patch');
        Route::delete('/{id}', [AchievementController::class, 'delete'])->name('achievement_delete');
    });
});
