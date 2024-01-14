<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerModel;
use App\Http\Requests\PartnerRequest;
use App\Models\PartnerListModel;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    function index()
    {
        $partner = PartnerModel::orderBy('id', 'desc')->get();
        return view('partner.index-category', compact('partner'));
    }

    function addView()
    {
        return view('partner.add-category');
    }

    function addPost(PartnerRequest $request)
    {
        DB::beginTransaction();
        try {
            PartnerModel::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            DB::commit();
            return redirect()->route('partner-category_view_index')->with('message', 'Kategori partner berhasil ditambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('partner-category_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $partner = PartnerModel::find($id);
        return view('partner.edit-category', compact('partner'));
    }

    function ajaxList($id)
    {
        $partner = PartnerModel::with(['lists'])->find($id);
        return view('front-ajax.partner-list', compact('partner'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $partner = PartnerModel::find($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description
            ];
            $partner->update($data);
            DB::commit();
            return redirect()->route('partner-category_view_index')->with('message', 'Kategory partner berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('partner-category_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            PartnerListModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete partner list success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete partner list failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
