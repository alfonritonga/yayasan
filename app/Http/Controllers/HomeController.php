<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Models\InspirationFigureModel;
use App\Models\JobModel;
use App\Models\LandingInfoModel;
use App\Models\PartnerListModel;
use App\Models\PartnerModel;
use App\Models\ProgramModel;

class HomeController extends Controller
{
    //
    function index()
    {
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->get();
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        $program = ProgramModel::orderBy('id', 'asc')->get();
        $landing_info = LandingInfoModel::find(1);
        // $donations = DonationModel::orderBy('id', 'desc')->get();
        return view('home.index', compact('article', 'partner', 'program', 'landing_info'));
    }

    function tentang()
    {
        $partner = PartnerModel::with(['lists'])->orderBy('id', 'asc')->get();
        $landing_info = LandingInfoModel::find(1);
        return view('tentang', compact('partner', 'landing_info'));
    }

    function donasi()
    {

        return view('donasi');
    }

    function kontak()
    {

        return view('kontak');
    }

    function program()
    {
        $program = ProgramModel::with(['tasks'])->orderBy('id', 'asc')->get();
        return view('program', compact('program'));
    }

    function media()
    {
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->get();
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        return view('materi', compact('partner', 'article'));
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
}
