<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Models\MediaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MediaMateriController extends Controller
{
    //
    function index()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $media = MediaModel::orderBy('id', 'desc')->get();
        return view('media-materi.index', compact('media'));
    }

    function addVideo()
    {
        // $genre = GenreModel::all();
        return view('media-materi.addVideo');
    }

    function addPhoto()
    {
        // $genre = GenreModel::all();
        return view('media-materi.addPhoto');
    }

    function addPostVideo(MediaRequest $request)
    {
        $file = $request->file('media');
        $extension = strtolower($file->getClientOriginalExtension());
        if ($extension == 'jpg' || $extension == 'png') {
            return redirect()->route('add_video_view_index')->with('error_message', 'Pilihlah Video');
        } else {
            DB::beginTransaction();
            try {
                if ($file != null) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('/asset'), $imageName);
                    $path = 'asset/' . $imageName;
                } else {
                    $path = null;
                }

                $media = MediaModel::create([
                    // 'guid' => Str::uuid()->toString(),
                    'user_id' => Auth::user()->id,
                    'type' => 'video',
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status == 'true' ? 1 : 0,
                    'media' => $path,
                ]);
                DB::commit();
                return redirect()->route('video_view_index')->with('message', 'Video berhasil di tambahkan!');
            } catch (\Exception $exception) {
                DB::rollBack();
                return redirect()->route('add_video_view_index')->with('error_message', $exception->getMessage());
            }
            return redirect()->route('video_view_index')->with('message', 'Video berhasil di tambahkan!');
        }
    }

    function addPostPhoto(MediaRequest $request)
    {
        $file = $request->file('media');
        $extension = strtolower($file->getClientOriginalExtension());
        if ($extension == 'mp4' || $extension == '3gp') {
            return redirect()->route('add_video_view_index')->with('error_message', 'Pilihlah Photo');
        } else {
            DB::beginTransaction();
            try {
                if ($file != null) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('/asset'), $imageName);
                    $path = 'asset/' . $imageName;
                } else {
                    $path = null;
                }

                $media = MediaModel::create([
                    // 'guid' => Str::uuid()->toString(),
                    'user_id' => Auth::user()->id,
                    'type' => 'photo',
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status == 'true' ? 1 : 0,
                    'media' => $path,
                ]);
                DB::commit();
                return redirect()->route('photo_view_index')->with('message', 'Photo berhasil di tambahkan!');
            } catch (\Exception $exception) {
                DB::rollBack();
                return redirect()->route('add_photo_view_index')->with('error_message', $exception->getMessage());
            }
            return redirect()->route('photo_view_index')->with('message', 'Photo berhasil di tambahkan!');
        }
    }

    function indexVideo()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $media = MediaModel::with(['admin'])->where('type', 'video')->orderBy('id', 'desc')->get();
        // dd($media);
        return view('media-materi.indexVideo', compact('media'));
    }

    function indexPhoto()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $photos = MediaModel::with(['admin'])->where('type', 'photo')->orderBy('id', 'desc')->get();
        // dd($media);
        return view('media-materi.indexPhoto', compact('photos'));
    }
}
