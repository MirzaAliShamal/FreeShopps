<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use App\Notifications\UserNotification;
use App\Models\StoreSchedule;
use Illuminate\Http\Request;
use App\Models\ListingImage;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Transaction;
use App\Models\Participant;
use App\Models\Favourite;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\Listing;
use App\Models\BlogTag;
use App\Models\Message;
use App\Models\Thread;
use App\Models\Store;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Image;
use File;
use Str;

class HomeController extends Controller
{
    public function home(Request $req)
    {
        if ($req->ajax()) {
            $lat = $req->lat;
            $lng = $req->lng;
            $rad = $req->rad;

            if (auth()->check()) {
                $user = auth()->user();

                $listings = Listing::selectRaw("*, ( 3956 * acos( cos( radians(?) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( location_lat ) ) ) ) AS distance", [$lat, $lng, $lat])
                    ->where('status', '2')
                    ->where('availablity', '1')
                    ->where('user_id', '!=', $user->id)
                    ->having("distance", "<", $rad)
                    ->with('listing_images', 'category')
                    ->orderBy('created_at', 'DESC')->get();
            } else {
                $listings = Listing::selectRaw("*, ( 3956 * acos( cos( radians(?) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( location_lat ) ) ) ) AS distance", [$lat, $lng, $lat])
                    ->where('status', '2')
                    ->where('availablity', '1')
                    ->having("distance", "<", $rad)
                    ->with('listing_images', 'category')
                    ->orderBy('created_at', 'DESC')->get();
            }

            return response()->json([
                'statusCode' => 200,
                'html' => view('ajax.listings', get_defined_vars())->render(),
            ]);
        } else {
            return view('front.home', get_defined_vars());
        }
    }

    public function blog($slug = null)
    {
        $categories = BlogCategory::withCount('blog_posts')->orderBy('name', 'ASC')->get();
        $recent = BlogPost::orderBy('created_at', 'DESC')->limit(3)->get();
        $tags = BlogTag::all()->unique('name')->random(10);

        if (is_null($slug)) {
            $blogs = BlogPost::where('status', '3')
                ->with('blog_category', 'user', 'blog_tags')
                ->orderBy('created_at', 'DESC')->paginate(16);

            return view('front.blog', get_defined_vars());
        } else {
            $blog = BlogPost::where('slug', $slug)->with('blog_category', 'user', 'blog_tags', 'blog_comments')->first();
            $related = BlogPost::where('blog_category_id', $blog->blog_category_id)
                ->with('blog_category', 'user', 'blog_tags')->limit(2)->get();

            return view('front.blog_detail', get_defined_vars());
        }

    }

    public function blogCategory($slug = null)
    {
        $categories = BlogCategory::withCount('blog_posts')->orderBy('name', 'ASC')->get();
        $recent = BlogPost::orderBy('created_at', 'DESC')->limit(3)->get();
        $tags = BlogTag::all()->unique('name')->random(10);

        $blogs = BlogPost::where('status', '3')
            ->with('blog_category', 'user', 'blog_tags')
            ->whereHas('blog_category', function($q) use($slug) {
                $q->where('slug', $slug);
            })->orderBy('created_at', 'DESC')->paginate(16);

        return view('front.blog_category', get_defined_vars());
    }

    public function postComment(Request $req, $id = null)
    {
        $blog = BlogPost::find($id);

        $comment = new BlogComment();
        $comment->blog_post_id = $blog->id;
        $comment->name = $req->name;
        $comment->email = $req->email;
        $comment->comment = $req->comment;
        $comment->save();

        if ($comment) {

            $data = collect([
                'icon' => asset('bell-icon.jpg'),
                'title' => 'New Comment!',
                'body' => 'Blog received a new comment. Click to see',
                'action' => route('admin.comment.all'),
            ]);
            $notif = User::whereRole('2')->first();
            $notif->notify(new UserNotification($data));

            return response()->json([
                'statusCode' => 200,
                'message' => 'Your comment is successfully submitted, It will be shown here after admin approval',
            ]);
        } else {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Something Went Wrong!',
            ]);
        }

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
            ->where('availablity', '1')
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

    public function postAdSave(Request $req, $id = null)
    {
        $req->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $pass = Str::random(8);

            $user = User::where('email', $req->email)->first();

            if (is_null($user)) {
                $user = User::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'password' => bcrypt($pass),
                ]);
            }
        }


        if (is_null($id)) {
            $req->validate([
                'images' => 'required',
            ]);
            $listing = new Listing();
        } else {
            $listing = Listing::find($id);
        }

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
        $listing->show_map = $req->show_map ? 1 : 0;
        $listing->status = "2";
        $listing->save();

        if ($listing) {
            if (isset($req->images)) {
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

                if (is_null($id) && count($req->images) > 0) {

                    $image = $listing->listing_images[0];
                    $listing = Listing::find($listing->id);
                    $path = "listings/".Str::slug($req->title);
                    $filename = 'featured-'.Str::random(8).'.'.$req->images[0]->getClientOriginalExtension();

                    Image::make(public_path($image->path))->resize(250,250)->save(public_path($path.'/'.$filename));

                    $listing->featured_image = $path.'/'.$filename;
                    $listing->save();
                }
            }
        }

        if (is_null($id)) {
            return redirect()->route('thankyou');
        } else {
            return redirect()->route('user.dashboard');
        }

    }

    public function thankyou(Request $req)
    {
        return view('front.thankyou', get_defined_vars());
    }

    public function deleteListingImage(Request $req)
    {
        $path = explode(route('home')."/", $req->file);
        ListingImage::where('path', $path[1])->delete();

        if (File::exists(public_path($path[1]))) {
            File::delete(public_path($path[1]));
        }

        return response()->json(true);
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

            $listing = Listing::find($id);
            $listing->availablity = '2';
            $listing->save();

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
                        $order = Order::create([
                            'order_no' => generateOrderNo(),
                            'transaction_id' => $transaction->id,
                            'listing_id' => $item->listing_id,
                            'amount' => 1,
                        ]);

                        if ($order) {
                            $user->cart()->delete();

                            $check = Thread::all()->filter(function($q) use($user, $order) {
                                return $q->participants()->where('user_id', $user->id)->first() && $q->participants()->where('user_id', $order->listing->user->id)->first();
                            })->count();

                            if ($check == 0) {
                                $thread = Thread::create();
                                Participant::create([
                                    'thread_id' => $thread->id,
                                    'user_id' => $order->transaction->user->id,
                                ]);
                                Participant::create([
                                    'thread_id' => $thread->id,
                                    'user_id' => $order->listing->user->id,
                                ]);
                            }

                            $data = collect([
                                'icon' => asset('bell-icon.jpg'),
                                'title' => 'New Order!',
                                'body' => 'You have got new order request on your product. Click to see',
                                'action' => route('user.order', $order->order_no),
                            ]);

                            $notif = User::find($order->listing->user->id);
                            $notif->notify(new UserNotification($data));

                            $email_data = [
                                "subject" => "Good news: You've received an order request",
                                "view" => "user.order_received",
                                "order" => $order,
                                "user" => $notif,
                            ];
                            $notif->notify(new EmailNotification($email_data));
                        }
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

    public function updateFCMToken(Request $req)
    {
        $user = User::find($req->user_id);
        $user->fcm_token = $req->fcm_token;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Token updated Successfully!',
        ]);
    }

    public function notification($id = null)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            return redirect($notification->data['data']['action']);
        }
    }

    public function markRead($id = null)
    {
        $user = auth()->user();
        if (is_null($id)) {
            $user->unreadNotifications->markAsRead();
        } else {
            $user->unreadNotifications->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })->markAsRead();
        }

        return response()->noContent();
    }

    public function markUnread($id = null)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->read_at = null;
        $notification->save();

        return response()->noContent();
    }
}
