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
use App\Http\Controllers\UytController;
use App\Http\Controllers\UytAdminController;
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

Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);

Route::get('/login', [AuthController::class, 'viewlogin'])->name('login');
Route::post('/login', [AuthController::class, 'proccesslogin']);
Route::post('/', [AuthController::class, 'proccesslogin']);
Route::get('/logout', [AuthController::class, 'proccesslogout']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/donasi', [HomeController::class, 'donasi'])->name('landing_donasi');
Route::get('/program', [HomeController::class, 'program']);
Route::get('/kontak', [HomeController::class, 'kontak'])->name('contact');
Route::get('/artikel-galeri', [HomeController::class, 'media'])->name('media_materi');
Route::get('/lowongan-kerja', [HomeController::class, 'lowongan'])->name('lowongan');
Route::get('/lowongan-kerja/{guid}', [HomeController::class, 'lowonganDetail'])->name('lowongan_detail');
Route::get('/article/{slug}', [HomeController::class, 'articleDetail'])->name('article_detail');

// UYT Frontend Routes
Route::prefix('/uyt')->group(function () {
    Route::get('/', [UytController::class, 'index'])->name('uyt_index');
    Route::get('/cerita-dampak', [UytController::class, 'ceritaDampak'])->name('uyt_cerita_dampak');
    Route::post('/cerita-dampak/kirim', [UytController::class, 'submitStory'])->name('uyt_submit_story');
    Route::get('/fasilitator', [UytController::class, 'fasilitator'])->name('uyt_fasilitator');
    Route::get('/workshop', [UytController::class, 'workshop'])->name('uyt_workshop');
    Route::post('/workshop/daftar', [UytController::class, 'submitWorkshop'])->name('uyt_submit_workshop');
});

Route::post('/subscription', [SubscriptionController::class, 'addPost']);
Route::post('/donations', [DonationController::class, 'addPost'])->name('donation_add_post');
Route::post('/reports', [DonationController::class, 'reportaddPost'])->name('report_add_post');

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

    // UYT Admin Management Routes
    Route::prefix('/admin-uyt')->group(function () {
        Route::get('/content', [UytAdminController::class, 'indexContent'])->name('admin_uyt_content');
        Route::post('/content', [UytAdminController::class, 'updateContent'])->name('admin_uyt_content_update');
        
        Route::get('/resources', [UytAdminController::class, 'indexResource'])->name('admin_uyt_resources');
        Route::post('/resources', [UytAdminController::class, 'storeResource'])->name('admin_uyt_resources_store');
        Route::delete('/resources/{id}', [UytAdminController::class, 'deleteResource'])->name('admin_uyt_resources_delete');

        Route::get('/facilitators', [UytAdminController::class, 'indexFacilitator'])->name('admin_uyt_facilitators');
        Route::post('/facilitators', [UytAdminController::class, 'storeFacilitator'])->name('admin_uyt_facilitators_store');
        Route::delete('/facilitators/{id}', [UytAdminController::class, 'deleteFacilitator'])->name('admin_uyt_facilitators_delete');

        Route::get('/stories', [UytAdminController::class, 'indexStories'])->name('admin_uyt_stories');
        Route::get('/stories/export', [UytAdminController::class, 'exportStories'])->name('admin_uyt_stories_export');
        Route::post('/stories/toggle/{id}', [UytAdminController::class, 'togglePublishStory'])->name('admin_uyt_stories_toggle');
        Route::delete('/stories/{id}', [UytAdminController::class, 'deleteStory'])->name('admin_uyt_stories_delete');

        Route::get('/workshops', [UytAdminController::class, 'indexWorkshops'])->name('admin_uyt_workshops');
        Route::get('/workshops/export', [UytAdminController::class, 'exportWorkshops'])->name('admin_uyt_workshops_export');
        Route::post('/workshops/status/{id}', [UytAdminController::class, 'updateWorkshopStatus'])->name('admin_uyt_workshops_status');
        Route::delete('/workshops/{id}', [UytAdminController::class, 'deleteWorkshop'])->name('admin_uyt_workshops_delete');

        // Artikel Khusus UYT
        Route::get('/articles', [UytAdminController::class, 'indexArticles'])->name('admin_uyt_articles');
        Route::get('/articles/add', [UytAdminController::class, 'addArticleView'])->name('admin_uyt_articles_add_view');
        Route::post('/articles/add', [UytAdminController::class, 'storeArticle'])->name('admin_uyt_articles_add');
        Route::get('/articles/edit/{id}', [UytAdminController::class, 'editArticleView'])->name('admin_uyt_articles_edit_view');
        Route::patch('/articles/edit/{id}', [UytAdminController::class, 'updateArticle'])->name('admin_uyt_articles_edit');
        Route::delete('/articles/{id}', [UytAdminController::class, 'deleteArticle'])->name('admin_uyt_articles_delete');

        // Video Khusus UYT
        Route::get('/videos', [UytAdminController::class, 'indexVideos'])->name('admin_uyt_videos');
        Route::get('/videos/add', [UytAdminController::class, 'addVideoView'])->name('admin_uyt_videos_add_view');
        Route::post('/videos/add', [UytAdminController::class, 'storeVideo'])->name('admin_uyt_videos_add');
        Route::get('/videos/edit/{id}', [UytAdminController::class, 'editVideoView'])->name('admin_uyt_videos_edit_view');
        Route::patch('/videos/edit/{id}', [UytAdminController::class, 'updateVideo'])->name('admin_uyt_videos_edit');
        Route::delete('/videos/{id}', [UytAdminController::class, 'deleteVideo'])->name('admin_uyt_videos_delete');
    });
});
