<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Models\PartnerListModel;
use App\Models\ProgramModel;

class HomeController extends Controller
{
    //
    function index()
    {
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->get();
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        $program = ProgramModel::orderBy('id', 'desc')->get();
        // $donations = DonationModel::orderBy('id', 'desc')->get();
        return view('home.index', compact('article', 'partner', 'program'));
    }

    function tentang()
    {
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        return view('tentang', compact('partner'));
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
        
        return view('program');
    }

    function media()
    {
        
        return view('materi');
    }
}
