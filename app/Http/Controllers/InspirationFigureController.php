<?php

namespace App\Http\Controllers;

use App\Models\InspirationFigureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InspirationFigureController extends Controller
{
    function index()
    {
        $inspiration_figures = InspirationFigureModel::orderBy('id', 'desc')->get();
        return view('inspiration-figure.index', compact('inspiration_figures'));
    }

    function addView()
    {
        return view('inspiration-figure.add');
    }

    function addPost(Request $request)
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

            InspirationFigureModel::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
            ]);

            DB::commit();
            return redirect()->route('inspiration-figure_view_index')->with('message', 'Sosok Inspiratif berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('inspiration-figure_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $inspiration_figure = InspirationFigureModel::find($id);
        return view('inspiration-figure.edit', compact('inspiration_figure'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $inspiration_figure = InspirationFigureModel::find($id);
            $data = [
                'name' => $request->name,
                'status' => $request->status == 'true' ? 1 : 0,
                'description' => $request->description,
            ];

            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['media'] = $path;
            }
            $inspiration_figure->update($data);
            DB::commit();

            return redirect()->route('inspiration-figure_view_index')->with('message', 'Sosok Inspiratif berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('inspiration-figure_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            $inspiration_figure = InspirationFigureModel::find($id);
            $inspiration_figure->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete sosok inspiratif success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete sosok inspiratif failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
