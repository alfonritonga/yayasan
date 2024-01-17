<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobModel;
use App\Models\JobQualificationModel;
use App\Models\JobTaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobController extends Controller
{
    function index()
    {
        $jobs = JobModel::orderBy('id', 'desc')->get();
        return view('lowongan.index', compact('jobs'));
    }

    function addView()
    {
        return view('lowongan.add');
    }

    function addPost(JobRequest $request)
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

            $job = JobModel::create([
                'guid' => Str::uuid()->toString(),
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'from' => $request->from,
                'to' => $request->to,
                'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
                'type' => $request->type,
                'location' => $request->location
            ]);

            DB::commit();
            return redirect()->route('job_view_index')->with('message', 'Lowongan berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('job_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $job = JobModel::with(['admin'])->find($id);
        return view('lowongan.edit', compact('job'));
    }

    function editPatch(JobRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $job = JobModel::with('admin')->find($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'from' => $request->from,
                'from' => $request->from,
                'to' => $request->to,
                'status' => $request->status == 'true' ? 1 : 0,
                'type' => $request->type,
                'location' => $request->location
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

            return redirect()->route('job_view_index')->with('message', 'Lowongan berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('job_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            $job = JobModel::find($id);
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
}
