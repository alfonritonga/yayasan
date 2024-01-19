<?php

namespace App\Http\Controllers;

use App\Models\MateriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    function index()
    {
        $materi = MateriModel::orderBy('id', 'desc')->get();
        return view('materi.index', compact('materi'));
    }

    function addView()
    {
        return view('materi.add');
    }

    function addPost(Request $request)
    {
        $file = $request->file('image');
        DB::beginTransaction();
        try {
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            MateriModel::create([
                'title' => $request->title,
                'image' => $path,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('materi_view_index')->with('message', 'Materi berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('materi_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $materi = MateriModel::find($id);
        return view('materi.edit', compact('materi'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $materi = MateriModel::find($id);
            $data = [
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ];

            $file = $request->file('image');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['image'] = $path;
            }
            $materi->update($data);
            DB::commit();

            return redirect()->route('materi_view_index')->with('message', 'Materi berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('materi_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            MateriModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete materi success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete materi failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
