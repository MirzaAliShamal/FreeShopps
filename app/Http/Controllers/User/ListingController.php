<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListingImage;
use App\Models\Listing;
use App\Models\Store;

class ListingController extends Controller
{
    public function listings()
    {
        $user = auth()->user();
        $listings = $user->listings;

        return view('user.listing', get_defined_vars());
    }
}
