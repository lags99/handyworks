<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    public function index()
    {
        $cities = City::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.cities', ['cities' => $cities]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric',],
        ]);

        $city = new City;
        $city->name = $request->name;
        $city->longitude = $request->longitude;
        $city->latitude = $request->latitude;

        $city->save();

        return redirect()->back()->with('success', 'City Saved Successfully');
    }
}
