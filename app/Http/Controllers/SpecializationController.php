<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    //

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255', 'string'],
            "rate" => ['required', 'min:100', 'numeric']
        ]);
        $request->user()->specializations()->create([
            'name' => $request->name,
            'rate' => $request->rate
        ]);
        return redirect()->back();
    }
}
