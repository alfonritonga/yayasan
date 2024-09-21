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
        $apiKey = 'AIzaSyCC8mVo5mPuMGDVTqoU_MJRZ7dabn1SDHk';

        // Channel ID or Playlist ID
        $channelId = 'UC7JWCqX0uDWZVtmYYdolhXw'; // Replace with the channel ID you want to fetch videos from

        // API Endpoint for fetching videos from the channel
        $apiEndpoint = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$channelId.'&maxResults=50&order=date&type=video&key='.$apiKey;

        // Initialize cURL
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $apiEndpoint);

        // Return the response instead of printing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $videos = json_decode($response);
        $items = $videos->items ?? [];
        $videosHome = null;

        foreach ($items as $key => $value) {
            if ($key === 0) {
                $videosHome = $value;
            }
        }
        
        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->limit(3)->get();
        $partner = PartnerListModel::with('admin', 'category')->orderBy('id', 'desc')->get();
        $program = ProgramModel::orderBy('id', 'asc')->get();
        $landing_info = LandingInfoModel::find(1);
        $achievements = AchievementModel::with(['programs', 'donations'])->where('status', 1)->orderBy('id', 'desc')->get();
        $videos = MediaModel::with(['admin'])->where('type', 'video')->orderBy('id', 'desc')->limit(1)->get();
        return view('home.index', compact('article', 'partner', 'program', 'landing_info', 'achievements', 'videos', 'videosHome'));
    }

    function sitemap(){
        $posts = ArticleModel::orderBy('updated_at', 'DESC')->get();
        return response()->view('sitemap', compact('posts'))->header('Content-Type', 'text/xml');
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
        $apiKey = 'AIzaSyCC8mVo5mPuMGDVTqoU_MJRZ7dabn1SDHk';

        // Channel ID or Playlist ID
        $channelId = 'UC7JWCqX0uDWZVtmYYdolhXw'; // Replace with the channel ID you want to fetch videos from

        // API Endpoint for fetching videos from the channel
        $apiEndpoint = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$channelId.'&maxResults=50&order=date&type=video&key='.$apiKey;

        // Initialize cURL
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $apiEndpoint);

        // Return the response instead of printing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $videos = json_decode($response);
        $items = $videos->items ?? [];

        // Check if the response contains videos
        // if(isset($videos->items)) {
        //     foreach($videos->items as $video) {
        //         // Extract video ID and title
        //         $videoId = $video->id->videoId;
        //         $title = $video->snippet->title;
        //         echo "Title: ".$title."<br>";
        //         echo "Video ID: ".$videoId."<br>";
        //         echo "Watch: https://www.youtube.com/watch?v=".$videoId."<br><br>";
        //     }
        // } else {
        //     echo "No videos found.";
        // }

        $article = ArticleModel::with('admin')->orderBy('id', 'desc')->paginate(6);
        $materi = MateriModel::orderBy('id', 'desc')->paginate(4);
        $data_photo = MediaModel::with(['admin'])->where('type', 'photo')->orderBy('id', 'asc')->get();
        $photos = $data_photo->toArray();
        $videos = MediaModel::with(['admin'])->where('type', 'video')->orderBy('id', 'desc')->limit(4)->get();
        return view('materi', compact('article', 'materi', 'photos', 'videos', 'items'));
    }

    function lowongan()
    {
        $jobs = JobModel::with('admin')->orderBy('id', 'desc')->get();
        $inspiration_figures = InspirationFigureModel::orderBy('id', 'desc')->get();
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
