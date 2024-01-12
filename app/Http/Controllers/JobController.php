<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobController extends Controller
{
    //
    function index()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $jobs = JobModel::orderBy('id', 'desc')->get();
        return view('lowongan.index', compact('jobs'));
    }

    function addJob()
    {
        // $genre = GenreModel::all();
        return view('lowongan.add');
    }

    function editView($id)
    {
        $job = JobModel::with('admin')->find($id);
        // dd($job);
        return view('lowongan.edit', compact('job'));
    }

    function editPatch(JobRequest $request, $id)
    {
        $file = $request->file('media');
        DB::beginTransaction();
        try {
            $job = JobModel::with('admin')->find($id);

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

           
            return redirect()->route('job_view_index')->with('message', 'Lowongan berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('job_edit', $id)->with('error_message', $exception->getMessage());
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


    function addPostJob(JobRequest $request)
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

            $job = JobModel::create([
                'guid' => Str::uuid()->toString(),
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'from' => $request->from,
                'to' => $request->to,
                'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('job_view_index')->with('message', 'Lowongan berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('add_job_view_index')->with('error_message', $exception->getMessage());
        }
        return redirect()->route('job_view_index')->with('message', 'Lowongan berhasil di tambahkan!');
    }
}
