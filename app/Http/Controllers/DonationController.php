<?php

namespace App\Http\Controllers;

use App\Models\DonationModel;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    function index()
    {
        $donations = DonationModel::orderBy('id', 'desc')->get();
        return view('donasi.index', compact('donations'));
    }
}
