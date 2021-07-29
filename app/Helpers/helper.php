<?php

use App\Models\Favourite;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;

function getNavCat() {
    $cat = Category::where('status', true)->limit(7)->get();

    return $cat;
}

function getOtherNavCat() {
    $cat = Category::where('status', true)->skip(7)->take(10)->get();

    return $cat;
}

function getCart() {
    $user = auth()->user();
    return $user->cart;
}

function checkFav($id) {
    $user = auth()->user();
    $fav = Favourite::where('user_id', $user->id)->where('listing_id', $id)->first();

    if ($fav) {
        return true;
    } else {
        return false;
    }
}

function checkCart($id) {
    $user = auth()->user();
    $cart = Cart::where('user_id', $user->id)->where('listing_id', $id)->first();

    if ($cart) {
        return true;
    } else {
        return false;
    }
}

function generateOrderNo() {
    $no = "FS".substr(str_shuffle("A0B1C2D3E4F5G6HI7J8K9L"), 0, 10);

    if (orderNoExists($no)) {
        return generateOrderNo();
    } else {
        return $no;
    }
}

function orderNoExists($number) {
    return Order::whereOrderNo($number)->exists();
}
