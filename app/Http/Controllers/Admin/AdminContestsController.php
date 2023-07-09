<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContestsController extends Controller
{
    protected function getContests()
    {
        return view('admin.page.contests', ['contests' => Contest::all(), 'users' => User::all()]);
    }
    protected function addMili(Request $request)
    {
        DB::transaction(function () use ($request) {
            User::find($request->user_id)->update([
                'balance' => $request->points,
            ]);

            Contest::create([
                'user_id' => $request->user_id,
                'contest_name' => $request->contest_name,
                'contest_type' => $request->contest_type,
                'points' => $request->points,
                'link_detailed' => $request->link_detailed,
            ]);
        });
        return redirect()->back()->with('success', 'Операция выполнена');
    }

    protected function deleteContest(Request $request){
        Contest::find($request->id)->delete();
        return redirect()->back()->with('success', 'Операция выполнена');
    }
}
