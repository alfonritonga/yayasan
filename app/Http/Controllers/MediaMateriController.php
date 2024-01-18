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
    // PHOTO
    function indexPhoto()
    {
        $photos = MediaModel::with(['admin'])->where('type', 'photo')->orderBy('id', 'desc')->get();
        return view('media-materi.photo.index', compact('photos'));
    }

    function addViewPhoto()
    {
        return view('media-materi.photo.add');
    }

    function addPostPhoto(MediaRequest $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            MediaModel::create([
                'guid' => Str::uuid()->toString(),
                'type' => 'photo',
                'title' => $request->title,
                'description' => $request->description,
                'media' => $path,
                'user_id' => Auth::user()->id,
                'status' => $request->status == 'true' ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('photo_view_index')->with('message', 'Photo berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('photo_add_index')->with('error_message', $exception->getMessage());
        }
    }

    function editViewPhoto($id)
    {
        $photo = MediaModel::with(['admin'])->find($id);
        return view('media-materi.photo.edit', compact('photo'));
    }

    function editPatchPhoto(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $photo = MediaModel::with('admin')->find($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ];

            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['media'] = $path;
            }
            $photo->update($data);
            DB::commit();
            return redirect()->route('photo_view_index')->with('message', 'Photo berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('photo_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }


    function deletePhoto($id)
    {
        DB::beginTransaction();
        try {
            MediaModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete photo success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete photo failed',
                'error' => $exception->getMessage()
            ]);
        }
    }


    //VIDEO
    function indexVideo()
    {
        $videos = MediaModel::with(['admin'])->where('type', 'photo')->orderBy('id', 'desc')->get();
        return view('media-materi.video.index', compact('videos'));
    }

    function addViewVideo()
    {
        return view('media-materi.video.add');
    }

    function addPostVideo(MediaRequest $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            MediaModel::create([
                'guid' => Str::uuid()->toString(),
                'type' => 'video',
                'title' => $request->title,
                'description' => $request->description,
                'media' => $path,
                'user_id' => Auth::user()->id,
                'status' => $request->status == 'true' ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('video_view_index')->with('message', 'video berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('video_add_index')->with('error_message', $exception->getMessage());
        }
    }

    function editViewVideo($id)
    {
        $video = MediaModel::with(['admin'])->find($id);
        return view('media-materi.video.edit', compact('video'));
    }

    function editPatchVideo(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $video = MediaModel::with('admin')->find($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ];

            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['media'] = $path;
            }
            $video->update($data);
            DB::commit();
            return redirect()->route('video_view_index')->with('message', 'video berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('video_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }


    function deleteVideo($id)
    {
        DB::beginTransaction();
        try {
            MediaModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete video success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete video failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
