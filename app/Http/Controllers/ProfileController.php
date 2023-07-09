<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\ExchangeHistory;
use App\Models\User;
use App\Models\Orders;
use App\Models\Product;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function profilePage(){
        $dataUser = User::find(Auth()->user()->id);
        $exchangeHistory = ExchangeHistory::where('user_id', auth()->user()->id)->get();
        $order = Orders::where('user_id', auth()->user()->id)->paginate($perPage = 3, $columns = ['*'], $pageName = 'orders');
        $contest = Contest::where('user_id', auth()->user()->id)->paginate($perPage = 10, $columns = ['*'], $pageName = 'contests');
        if (!$dataUser) {
            return abort(404);
        }
        return view('profile', [
            'dataUser' => $dataUser,
            'history' => $exchangeHistory,
            'orders' => $order,
            'contests' => $contest,
        ]);
    }

    function pointsExchange(Request $request)
    {
        $points = $request->exchangeValue;
        if (isset($points) && $points > 1 && $points <= Auth()->user()->balance) {
            $userBalance = Auth()->user()->balance;
            $value = $userBalance - $points;
            ExchangeHistory::create([
                'user_id' => Auth()->user()->id,
                "points" => $points,
                "mili" => $points / 2,
            ]);
            User::find(Auth()->user()->id)->update([
                "balance" => $value,
                "mili" => (Auth()->user()->mili) + ($points / 2),
            ]);
            return redirect(route("profile.page"));
        } else {
            return redirect(route("profile.page"))->with('error', 'У вас не хватает баллов');
        }
    }
}
