<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        $admins = AdminModel::orderBy('id', 'desc')->get();
        return view('admin.index', compact('admins'));
    }

    function addView()
    {
        return view('admin.add');
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

            AdminModel::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'role' => $request->role,
                'image' => $path,
            ]);

            DB::commit();
            return redirect()->route('admin_view_index')->with('message', 'Pengurus berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $admin = AdminModel::find($id);
        return view('admin.edit', compact('admin'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $admin = AdminModel::find($id);
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'role' => $request->role,
            ];

            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['image'] = $path;
            }
            $admin->update($data);
            DB::commit();

            return redirect()->route('admin_view_index')->with('message', 'Pengurus berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            AdminModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete pengurus success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete pengurus failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
