<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    function index()
    {
        $subscription = SubscriptionModel::orderBy('id', 'desc')->get();
        return view('subscription.index', compact('subscription'));
    }

    function addPost(Request $request)
    {
        DB::beginTransaction();
        try {
            SubscriptionModel::create([
                'email' => $request->email
            ]);
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Add subscription success'
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
