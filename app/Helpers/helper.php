<?php

use App\Models\Category;

function getNavCat() {
    $cat = Category::where('status', true)->limit(7)->get();

    return $cat;
}

function getOtherNavCat() {
    $cat = Category::where('status', true)->skip(7)->take(10)->get();

    return $cat;
}
