<?php

namespace App\Http\Controllers;

use App\Models\StoreSchedule;
use Illuminate\Http\Request;
use App\Models\ListingImage;
use App\Models\Transaction;
use App\Models\Favourite;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Store;
use App\Models\Order;
use App\Models\Cart;
use Carbon\Carbon;
use Image;
use Str;

class HomeController extends Controller
{
    public function home(Request $req)
    {
        if (auth()->check()) {
            $user = auth()->user();

            $listings = Listing::where('status', '2')
                ->where('user_id', '!=', $user->id)
                ->with('listing_images', 'category')
                ->orderBy('created_at', 'DESC')->get();
        } else {
            $listings = Listing::where('status', '2')
                ->with('listing_images', 'category')
                ->orderBy('created_at', 'DESC')->get();
        }

        return view('front.home', get_defined_vars());
    }

    public function listing($slug = null)
    {
        if (!is_null($slug)) {
            $listing = Listing::where('slug', $slug)->with('listing_images', 'category')->first();

            return view('front.listing_detail', get_defined_vars());
        }
    }

    public function store($slug = null)
    {
        $store = Store::where('slug', $slug)->first();

        $user = $store->user;
        $listings = $user->listings;

        return view('front.store', get_defined_vars());
    }

    public function all(Request $req)
    {
        $cats = Category::where('status', true)->orderBy('name', 'ASC')->get();
        $listings = Listing::where('status', '2')
            ->with('listing_images', 'category');

        if (isset($req->category)) {
            $category = Category::where('slug', $req->category)->first();
            $listings = $listings->where('category_id', $category->id);
        }

        if (auth()->check()) {
            $user = auth()->user();
            $listings = $listings->where('user_id', '!=', $user->id);
        }

        if (isset($req->q)) {
            $listings = $listings->where('title', 'like', '%'.$req->q.'%');
        }

        if (isset($req->sort)) {
            if ($req->sort == "oldest") {
                $listings = $listings->orderBy('created_at', 'ASC');
            }
            if ($req->sort == "title_asc") {
                $listings = $listings->orderBy('title', 'ASC');
            }
            if ($req->sort == "title_desc") {
                $listings = $listings->orderBy('title', 'DESC');
            }
        }

        $listings = $listings->paginate(16);

        return view('front.all', get_defined_vars());
    }

    public function postAd()
    {
        $categories = Category::where('status', true)->orderBy('name', 'ASC')->get();
        return view('front.post_ad', get_defined_vars());
    }

    public function postAdSave(Request $req)
    {
        $req->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
            'images' => 'required',
        ]);

        $user = auth()->user();

        $listing = new Listing();
        $listing->user_id = $user->id;
        $listing->category_id = $req->category_id;
        $listing->title = $req->title;
        $listing->slug = Str::slug($req->title);
        $listing->description = $req->description;
        $listing->video_url = $req->video_url;
        $listing->phone = $req->phone;
        $listing->email = $req->email;
        $listing->location = $req->location;
        $listing->location_lat = $req->location_lat;
        $listing->location_long = $req->location_long;
        $listing->show_map = $req->location_long ? 1 : 0;
        $listing->status = "2";
        $listing->save();

        if ($listing) {
            for ($i=0; $i < count($req->images) ; $i++) {
                $listing_img = new ListingImage();
                $listing_img->listing_id = $listing->id;

                $image_f = $req->images[$i];
                $path_f = "listings/".Str::slug($req->title);
                $filename_f = 'full-'.Str::random(8).'.'.$image_f->getClientOriginalExtension();

                $image_f->move($path_f,$filename_f);
                Image::make(public_path($path_f.'/'.$filename_f))->resize(600,800)->save(public_path($path_f.'/'.$filename_f));

                $listing_img->path = $path_f.'/'.$filename_f;
                $listing_img->save();
            }

            if (count($req->images) > 0) {

                $image = $listing->listing_images[0];
                $listing = Listing::find($listing->id);
                $path = "listings/".Str::slug($req->title);
                $filename = 'featured-'.Str::random(8).'.'.$req->images[0]->getClientOriginalExtension();

                Image::make(public_path($image->path))->resize(250,250)->save(public_path($path.'/'.$filename));

                $listing->featured_image = $path.'/'.$filename;
                $listing->save();
            }
        }

        return redirect()->route('user.dashboard');
    }

    public function addToFav($id = null)
    {
        $user = auth()->user();

        $exist = Favourite::where('user_id', $user->id)->where('listing_id', $id)->first();

        if ($exist) {
            return response()->json([
                'statusCode' => 200,
                'message' => 'Already added in Favourites',
            ]);
        }

        $fav = Favourite::create([
            'user_id' => $user->id,
            'listing_id' => $id,
        ]);

        if ($fav) {
            return response()->json([
                'statusCode' => 200,
                'message' => 'Added To Favourites',
            ]);
        } else {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Something Went Wrong',
            ]);
        }
    }

    public function removeFav($id = null)
    {
        $user = auth()->user();

        Favourite::find($id)->delete();

        return redirect()->back()->with('success', 'Removed from Favourites');
    }

    public function cart()
    {
        $user = auth()->user();
        $cart = $user->cart;

        return view('front.cart', get_defined_vars());
    }

    public function addToCart($id = null)
    {
        $user = auth()->user();

        $exist = Cart::where('user_id', $user->id)->where('listing_id', $id)->first();

        if ($exist) {
            return response()->json([
                'statusCode' => 200,
                'message' => 'Already added in Cart',
            ]);
        }

        $added = Cart::create([
            'user_id' => $user->id,
            'listing_id' => $id,
        ]);

        if ($added) {
            $cart = $user->cart;
            return response()->json([
                'statusCode' => 200,
                'html' => view('ajax.cart', get_defined_vars())->render(),
            ]);
        } else {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Something Went Wrong',
            ]);
        }
    }

    public function removeCart($id = null)
    {
        $user = auth()->user();

        Cart::find($id)->delete();

        return redirect()->back()->with('success', 'Removed from Cart');
    }

    public function checkout()
    {
        $user = auth()->user();
        $cart = $user->cart;

        return view('front.checkout', get_defined_vars());
    }

    public function placeOrder(Request $req)
    {
        $user = auth()->user();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $amount = count(getCart()) * 1;

        try
        {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount * 100,
                "currency" => "usd",
                "description" => "Processing Fee of ".count(getCart())." items purchase",
                "source" => $req->stripeToken,
            ));

            if ($charge) {
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'payment_method' => 'stripe',
                    'payment_id' => $charge->id,
                    'narration' => 'Processing Fee of '.count(getCart()).' items purchase',
                    'amount' => $amount,
                ]);

                if ($transaction) {
                    foreach (getCart() as $item) {
                        Order::create([
                            'order_no' => generateOrderNo(),
                            'transaction_id' => $transaction->id,
                            'listing_id' => $item->listing_id,
                            'amount' => 1,
                        ]);
                    }
                }
            }
        }
        catch(\Stripe\Error\Card $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }
        catch(\Stripe\Error\InvalidRequest $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }

        return redirect()->route('user.dashboard');
    }
}
