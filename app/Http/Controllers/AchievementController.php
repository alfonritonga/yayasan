<?php

namespace App\Http\Controllers;

use App\Models\AchievementDonationModel;
use App\Models\AchievementModel;
use App\Models\AchievementProgramModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    function index()
    {
        $achievement = AchievementModel::with(['programs', 'donations'])->orderBy('id', 'desc')->get();
        return view('achievement.index', compact('achievement'));
    }

    function addView()
    {
        return view('achievement.add');
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

            $achievement = AchievementModel::create([
                'year' => $request->year,
                'total_donation' => 0, //tidak pakai lagi
                'media' => $path,
                'url_video' => $request->url_video,
                'status' => ($request->status == 'true') ? 1 : 0
            ]);
            if ($request->has('programs')) {
                for ($i = 0; $i < count($request->programs); $i++) {
                    AchievementProgramModel::create([
                        'achievements_id' => $achievement->id,
                        'program' => $request->programs[$i]
                    ]);
                }
            }
            if ($request->has('name_donations')) {
                for ($i = 0; $i < count($request->name_donations); $i++) {
                    AchievementDonationModel::create([
                        'achievements_id' => $achievement->id,
                        'name' => $request->name_donations[$i],
                        'total_donation' => $request->total_donations[$i]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('achievement_view_index')->with('message', 'Pencapaian berhasil ditambah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('achievement_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $achievement = AchievementModel::with(['programs'])->find($id);
        return view('achievement.edit', compact('achievement'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $achievement = AchievementModel::find($id);
            $data = [
                'year' => $request->year,
                'total_donation' => 0, //tidak di pakai lagi
                'url_video' => $request->url_video,
                'status' => ($request->status == 'true') ? 1 : 0
            ];
            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['media'] = $path;
            }
            $achievement->update($data);
            AchievementProgramModel::where('achievements_id', $id)->delete();
            if ($request->has('programs')) {
                for ($i = 0; $i < count($request->programs); $i++) {
                    AchievementProgramModel::create([
                        'achievements_id' => $achievement->id,
                        'program' => $request->programs[$i]
                    ]);
                }
            }
            AchievementDonationModel::where('achievements_id', $id)->delete();
            if ($request->has('name_donations')) {
                for ($i = 0; $i < count($request->name_donations); $i++) {
                    AchievementDonationModel::create([
                        'achievements_id' => $achievement->id,
                        'name' => $request->name_donations[$i],
                        'total_donation' => $request->total_donations[$i]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('achievement_view_index')->with('message', 'Pencapaian berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('achievement_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            AchievementModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete achievement success'
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
