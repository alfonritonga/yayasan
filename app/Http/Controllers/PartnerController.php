<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerModel;
use App\Http\Requests\PartnerRequest;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    //
    function index()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $partner = PartnerModel::orderBy('id', 'desc')->get();
        return view('partner.indexCategory', compact('partner'));
    }

    function addCategory()
    {
        // $genre = GenreModel::all();
        return view('partner.add');
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
            $job = PartnerModel::find($id);
            $job->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete partner success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete partner failed',
                'error' => $exception->getMessage()
            ]);
        }
    }


    function addPostCategory(PartnerRequest $request)
    {
        // $file = $request->file('media');
        DB::beginTransaction();
        try {
            // if ($file != null) {
            //     $imageName = time() . '_' . $file->getClientOriginalName();
            //     $file->move(public_path('/asset'), $imageName);
            //     $path = 'asset/' . $imageName;
            // } else {
            //     $path = null;
            // }

            $partner = PartnerModel::create([
                // 'guid' => Str::uuid()->toString(),
                // 'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                // 'from' => $request->from,
                // 'to' => $request->to,
                // 'status' => $request->status == 'true' ? 1 : 0,
                // 'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('category_view_index')->with('message', 'Partner berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('add_category_view_index')->with('error_message', $exception->getMessage());
        }
        return redirect()->route('category_view_index')->with('message', 'Partner berhasil di tambahkan!');
    }
}
