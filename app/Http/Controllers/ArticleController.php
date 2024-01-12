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
    //
    //
    function index()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $articles = ArticleModel::orderBy('id', 'desc')->get();
        return view('artikel.index', compact('articles'));
    }

    function addArticle()
    {
        // $genre = GenreModel::all();
        return view('artikel.add');
    }

    function editView($id)
    {
        $job = ArticleModel::with('admin')->find($id);
        // dd($job);
        return view('artikel.edit', compact('job'));
    }

    function editPatch(ArticleRequest $request, $id)
    {
        $file = $request->file('media');
        DB::beginTransaction();
        try {
            $job = ArticleModel::with('admin')->find($id);

            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }
            
            if($file == null){
                $data = [
                    // 'guid' => Str::uuid()->toString(),
                    // 'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'from' => $request->from,
                    'to' => $request->to,
                    'status' => $request->status == 'true' ? 1 : 0
                ];
    
                $job->update($data);
    
                DB::commit();
            } else {
                $data = [
                    // 'guid' => Str::uuid()->toString(),
                    // 'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'from' => $request->from,
                    'to' => $request->to,
                    'status' => $request->status == 'true' ? 1 : 0,
                    'media' => $path
                ];
    
                $job->update($data);
    
                DB::commit();
            }

           
            return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('article_edit', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            $job = ArticleModel::find($id);
            $job->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete lowongan success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete lowongan failed',
                'error' => $exception->getMessage()
            ]);
        }
    }


    function addPostArticle(ArticleRequest $request)
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

            $job = ArticleModel::create([
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
            return redirect()->route('add_article_view_index')->with('error_message', $exception->getMessage());
        }
        return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di tambahkan!');
    }
}
