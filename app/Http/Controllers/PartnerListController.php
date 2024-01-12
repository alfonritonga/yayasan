<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerListModel;
use App\Models\PartnerModel;
use App\Http\Requests\PartnerListRequest;
use Illuminate\Support\Facades\DB;

class PartnerListController extends Controller
{
    //
    function index()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $partner = PartnerListModel::with(['category'])->orderBy('id', 'desc')->get();
        return view('partner.index', compact('partner'));
    }

    function addList()
    {
        // $genre = GenreModel::all();
        $partner = PartnerModel::orderBy('id', 'desc')->get();
        return view('partner.addList', compact('partner'));
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
            $job = PartnerListModel::find($id);
            $job->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete list success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete list failed',
                'error' => $exception->getMessage()
            ]);
        }
    }


    function addPostList(PartnerListRequest $request)
    {
        $file = $request->file('media');

        // dd($request);
        if(empty($request->partner_id)){
            return redirect()->route('add_list_view_index')->with('error_message', 'Partner Category tidak boleh kosong');
        }
        DB::beginTransaction();
        try {
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            $partner = PartnerListModel::create([
                // 'guid' => Str::uuid()->toString(),
                // 'user_id' => Auth::user()->id,
                'partner_id' => $request->partner_id,
                'title' => $request->title,
                'description' => $request->description,
                // 'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('list_view_index')->with('message', 'Partner List berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('add_list_view_index')->with('error_message', $exception->getMessage());
        }
        return redirect()->route('list_view_index')->with('message', 'Partner List berhasil di tambahkan!');
    }
}
