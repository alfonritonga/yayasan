<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerListModel;
use App\Models\PartnerModel;
use App\Http\Requests\PartnerListRequest;
use Illuminate\Support\Facades\DB;

class PartnerListController extends Controller
{
    function index()
    {
        $partner = PartnerListModel::with(['category'])->orderBy('id', 'desc')->get();
        return view('partner.index-list', compact('partner'));
    }

    function addView()
    {
        $partner = PartnerModel::orderBy('id', 'desc')->get();
        return view('partner.add-list', compact('partner'));
    }

    function addPost(PartnerListRequest $request)
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

            PartnerListModel::create([
                'partner_id' => $request->partner_id,
                'title' => $request->title,
                'description' => $request->description,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('partner-list_view_index')->with('message', 'Partner List berhasil ditambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('partner-list_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $partner_list = PartnerListModel::find($id);
        $partner = PartnerModel::orderBy('id', 'desc')->get();
        return view('partner.edit-list', compact('partner', 'partner_list'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $job = PartnerListModel::find($id);
            $data = [
                'partner_id' => $request->partner_id,
                'title' => $request->title,
                'description' => $request->description,
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
            return redirect()->route('partner-list_view_index')->with('message', 'Parner list berhasil diedit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('partner-list_edit_view', $id)->with('error_message', $exception->getMessage());
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
}
