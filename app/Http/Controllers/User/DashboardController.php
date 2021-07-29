<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $orders_placed = Order::where('status', '1')->whereHas('transaction', function($first) use($user) {
            $first->whereHas('user', function($second) use($user) {
                $second->where('id', $user->id);
            });
        })->get();

        $orders_receive = Order::where('status', '1')->whereHas('listing', function($first) use($user) {
            $first->whereHas('user', function($second) use($user) {
                $second->where('id', $user->id);
            });
        })->get();


        return view('user.dashboard', get_defined_vars());
    }

    public function favourite()
    {
        $user = auth()->user();
        $favourites = $user->favourites;

        return view('user.favourite', get_defined_vars());
    }
}
