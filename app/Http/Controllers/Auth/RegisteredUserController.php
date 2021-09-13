<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\UserNotification;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '1',
        ]);

        event(new Registered($user));

        Auth::login($user);
        $user->sendEmailVerificationNotification();

        $data = collect([
            'icon' => asset('bell-icon.jpg'),
            'title' => 'New User Registerd!',
            'body' => '"'.$user->name.'" just registerd on system. Click to see',
            'action' => route('admin.user.all'),
        ]);
        $notif = User::whereRole('2')->first();
        $notif->notify(new UserNotification($data));

        return response()->json([
            'statusCode' => 200,
            'reload' => true,
            'message' => 'Successfully Logged In',
        ]);

        // return redirect(RouteServiceProvider::HOME);
    }
}
