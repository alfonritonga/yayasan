<?php

namespace App\Http\Controllers;

use App\Models\LandingInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingInfoController extends Controller
{
    function descriptionView()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $landing_info = LandingInfoModel::find(1);
        return view('landing-info.description', compact('landing_info'));
    }

    function descriptionPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = [
                'description' => $request->description,
            ];
            LandingInfoModel::find(1)->update($data);
            DB::commit();
            return redirect()->route('description_view_index')->with('message', 'Description berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('description_view_index')->with('error_message', $exception->getMessage());
        }
    }

    function historyView()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $landing_info = LandingInfoModel::find(1);
        return view('landing-info.history', compact('landing_info'));
    }

    function historyPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = [
                'history' => $request->history,
            ];
            LandingInfoModel::find(1)->update($data);
            DB::commit();
            return redirect()->route('history_view_index')->with('message', 'Sejarah berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('history_view_index')->with('error_message', $exception->getMessage());
        }
    }

    function visiMissionView()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $landing_info = LandingInfoModel::find(1);
        return view('landing-info.visi-mission', compact('landing_info'));
    }

    function visiMissionPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = [
                'visi_mission' => $request->visi_mission,
            ];
            LandingInfoModel::find(1)->update($data);
            DB::commit();
            return redirect()->route('visi-mission_view_index')->with('message', 'Visi Misi berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('visi-mission_view_index')->with('error_message', $exception->getMessage());
        }
    }

    function partnershipView()
    {
        // $users = User::with(['role'])->orderBy('id', 'desc')->get();
        $landing_info = LandingInfoModel::find(1);
        return view('landing-info.partnership', compact('landing_info'));
    }

    function partnershipPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = [
                'partnership' => $request->partnership,
            ];
            LandingInfoModel::find(1)->update($data);
            DB::commit();
            return redirect()->route('partnership_view_index')->with('message', 'Kemitraan berhasil diubah!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('partnership_view_index')->with('error_message', $exception->getMessage());
        }
    }
}
