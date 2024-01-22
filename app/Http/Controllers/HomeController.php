<?php

namespace App\Http\Controllers;

use App\Models\AboutImageModel;
use App\Models\AchievementModel;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Models\InspirationFigureModel;
use App\Models\JobModel;
use App\Models\LandingInfoModel;
use App\Models\MateriModel;
use App\Models\MediaModel;
use App\Models\PartnerListModel;
use App\Models\PartnerModel;
use App\Models\ProgramModel;

class HomeController extends Controller
{
    function index()
    {
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->limit(3)->get();
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        $program = ProgramModel::orderBy('id', 'asc')->get();
        $landing_info = LandingInfoModel::find(1);
        $achievements = AchievementModel::with(['programs'])->where('status', 1)->orderBy('id', 'desc')->get();
        return view('home.index', compact('article', 'partner', 'program', 'landing_info', 'achievements'));
    }

    function tentang()
    {
        $partner = PartnerModel::with(['lists'])->orderBy('id', 'asc')->get();
        $landing_info = LandingInfoModel::find(1);
        $about_images = AboutImageModel::orderBy('id')->get();
        return view('tentang', compact('partner', 'landing_info', 'about_images'));
    }

    function donasi()
    {

        return view('donasi');
    }

    function kontak()
    {
        $admins = AdminModel::orderBy('id')->limit(3)->get();
        return view('kontak', compact('admins'));
    }

    function program()
    {
        $program = ProgramModel::with(['tasks'])->orderBy('id', 'asc')->get();
        return view('program', compact('program'));
    }

    function media()
    {
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->paginate(6);
        $materi = MateriModel::orderBy('id', 'desc')->limit('4')->get();
        $data_photo = MediaModel::with(['admin'])->where('type', 'photo')->orderBy('id', 'asc')->get();
        $photos = $data_photo->toArray();
        $videos = MediaModel::with(['admin'])->where('type', 'video')->orderBy('id', 'desc')->limit(4)->get();
        return view('materi', compact('article', 'materi', 'photos', 'videos'));
    }

    function lowongan()
    {
        $jobs = JobModel::with('admin')->orderBy('id', 'desc')->get();
        $inspiration_figures = InspirationFigureModel::orderBy('id', 'desc')->limit(3)->get();
        return view('lowongan', compact('jobs', 'inspiration_figures'));
    }

    function lowonganDetail($guid)
    {
        $job = JobModel::with('admin')->where('guid', $guid)->first();
        $other_jobs = JobModel::with('admin')->where('id', '!=', $job->id)->limit(3)->get();
        return view('lowongan-detail', compact('job', 'other_jobs'));
    }

    function articleDetail($slug)
    {
        $article = ArticleModel::where('slug', $slug)->first();
        $other_articles = ArticleModel::where('id', '!=', $article->id)->limit(3)->get();
        return view('article-detail', compact('article', 'other_articles'));
    }
}
