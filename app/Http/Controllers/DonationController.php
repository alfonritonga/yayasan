<?php

namespace App\Http\Controllers;

use App\Models\DonationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    function index()
    {
        $donations = DonationModel::orderBy('id', 'desc')->get();
        return view('donasi.index', compact('donations'));
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

            $job = DonationModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'amount' => $request->amount,
                'type_of_goods' => $request->type_of_goods,
                'type' => $request->type,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('landing_donasi')->with('message', 'Donasi berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('landing_donasi')->with('error_message', $exception->getMessage());
        }
    }
}
