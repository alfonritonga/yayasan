<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\ArticleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    function index()
    {
        $articles = ArticleModel::orderBy('id', 'desc')->get();
        return view('artikel.index', compact('articles'));
    }

    function addView()
    {
        return view('artikel.add');
    }

    function addPost(ArticleRequest $request)
    {
        $file = $request->file('media');
        DB::beginTransaction();
        try {
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            ArticleModel::create([
                'guid' => Str::uuid()->toString(),
                'slug' => Str::slug($request->title),
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('article_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $article = ArticleModel::with('admin')->find($id);
        return view('artikel.edit', compact('article'));
    }

    function editPatch(ArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $job = ArticleModel::with('admin')->find($id);
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'from' => $request->from,
                'to' => $request->to,
                'status' => $request->status == 'true' ? 1 : 0
            ];

            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['media'] = $path;
            }
            $job->update($data);
            DB::commit();

            return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('article_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            ArticleModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete artikel success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete artikel failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
