<?php

namespace App\Http\Controllers;

use App\Models\AboutImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutImageController extends Controller
{
    function index()
    {
        $about_images = AboutImageModel::orderBy('id', 'desc')->get();
        return view('about-image.index', compact('about_images'));
    }

    function addView()
    {
        return view('about-image.add');
    }

    function addPost(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('image');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            AboutImageModel::create([
                'image' => $path,
                'status' => $request->status == 'true' ? 1 : 0,
            ]);

            DB::commit();
            return redirect()->route('about-image_view_index')->with('message', 'Gambar tentang berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('about-image_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $about_image = AboutImageModel::find($id);
        return view('about-image.edit', compact('about_image'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $about_image = AboutImageModel::find($id);
            $data = [
                'status' => $request->status == 'true' ? 1 : 0
            ];

            $file = $request->file('image');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['image'] = $path;
            }
            $about_image->update($data);
            DB::commit();

            return redirect()->route('about-image_view_index')->with('message', 'Gambar tentang berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('about-image_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            AboutImageModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete about image success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete about image failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
