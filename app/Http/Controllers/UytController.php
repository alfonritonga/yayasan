<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\MediaModel;
use App\Models\UytArticle;
use App\Models\UytContent;
use App\Models\UytFacilitator;
use App\Models\UytResource;
use App\Models\UytStory;
use App\Models\UytVideo;
use App\Models\UytWorkshopRegistration;
use Illuminate\Http\Request;

class UytController extends Controller
{
    /**
     * Beranda Use Your Talents
     */
    public function index()
    {
        $hero = UytContent::where('key', 'hero')->first();
        $stats = UytContent::where('key', 'stats')->first();
        $mengenal = UytContent::where('key', 'mengenal_uyt')->first();
        $landasan = UytContent::where('key', 'landasan_alkitab')->first();
        $cara_kerja = UytContent::where('key', 'cara_kerja')->first();
        $resources = UytResource::where('status', 1)->orderBy('order_num', 'asc')->get();
        $articles = UytArticle::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        $videos = UytVideo::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();

        return view('uyt.index', compact(
            'hero', 'stats', 'mengenal', 'landasan', 'cara_kerja', 'resources', 'articles', 'videos'
        ));
    }

    /**
     * Halaman Cerita dan Dampak UYT
     */
    public function ceritaDampak()
    {
        $articles = UytArticle::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        $videos = UytVideo::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        $userStories = UytStory::where('is_published', 1)->orderBy('id', 'desc')->get();

        return view('uyt.cerita-dampak', compact('articles', 'videos', 'userStories'));
    }

    /**
     * Submit Kirim Cerita (Internal Form, tanpa external link)
     */
    public function submitStory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'organization' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'story' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('media'), 'uploads/uyt_stories', 1200, 78);
        }

        UytStory::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'organization' => $request->organization,
            'title' => $request->title,
            'story' => $request->story,
            'media' => $mediaPath,
            'is_published' => false,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Terima kasih! Cerita inspiratif Anda telah kami terima dan akan ditinjau oleh tim kami.'
        ]);
    }

    /**
     * Halaman Fasilitator UYT
     */
    public function fasilitator()
    {
        $info = UytContent::where('key', 'fasilitator_info')->first();
        $facilitators = UytFacilitator::where('status', 1)->orderBy('order_num', 'asc')->get();

        return view('uyt.fasilitator', compact('info', 'facilitators'));
    }

    /**
     * Halaman Kemitraan dan Workshop UYT
     */
    public function workshop()
    {
        $mitraInfo = UytContent::where('key', 'mitra_workshop')->first();
        $workshopPackages = UytContent::where('key', 'workshop_packages')->first();
        return view('uyt.workshop', compact('mitraInfo', 'workshopPackages'));
    }

    /**
     * Submit Pendaftaran Workshop (Internal Form, tanpa external link)
     */
    public function submitWorkshop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'workshop_type' => 'required|string|max:100',
            'estimated_participants' => 'nullable|integer',
            'preferred_date' => 'nullable|date',
            'message' => 'nullable|string',
        ]);

        UytWorkshopRegistration::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'organization_name' => $request->organization_name,
            'organization_type' => $request->organization_type,
            'city' => $request->city,
            'workshop_type' => $request->workshop_type,
            'estimated_participants' => $request->estimated_participants,
            'preferred_date' => $request->preferred_date,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pendaftaran workshop Anda telah berhasil dikirim! Tim Use Your Talents Indonesia akan segera menghubungi Anda.'
        ]);
    }
}
