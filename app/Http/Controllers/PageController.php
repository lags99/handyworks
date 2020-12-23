<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest', 'guest:admin']);
    }
    //
    public function index()
    {
        $cities = City::orderBy('name', 'asc')->get();
        $latest = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.index', ['cities' => $cities, 'latest' => $latest]);
    }
}
