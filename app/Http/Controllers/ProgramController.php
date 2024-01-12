<?php

namespace App\Http\Controllers;

use App\Models\ProgramModel;
use App\Models\ProgramTaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    function index()
    {
        $program = ProgramModel::with(['tasks'])->orderBy('id', 'desc')->get();
        return view('program.index', compact('program'));
    }

    function addView()
    {
        return view('program.add');
    }

    function addPost(Request $request)
    {
        DB::beginTransaction();
        try {
            $program = ProgramModel::create([
                'title' => $request->title,
                'description' => $request->description,
                'media' => $request->media
            ]);
            if ($request->has('tasks')) {
                for ($i = 0; $i < count($request->tasks); $i++) {
                    ProgramTaskModel::create([
                        'programs_id' => $program->id,
                        'task' => $request->tasks[$i]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('program_view_index')->with('message', 'Program berhasil ditambah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('program_view_add')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $program = ProgramModel::find($id);
        return view('program.edit', compact('program'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $program = ProgramModel::find($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'media' => $request->media,
            ];
            $program->update($data);
            ProgramTaskModel::where('programs_id', $id)->delete();
            if ($request->has('tasks')) {
                for ($i = 0; $i < count($request->tasks); $i++) {
                    ProgramTaskModel::create([
                        'programs_id' => $program->id,
                        'task' => $request->tasks[$i]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('program_view_index')->with('message', 'Program berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('program_edit_view')->with('error_message', $exception->getMessage());
        }
    }

    function delete(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            ProgramModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete program success'
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
