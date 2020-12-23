<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //
    public function store(Request $request)
    {

        $messages = [
            'certification.max' => "File size should be maximum of 2MB "
        ];
        $this->validate($request, [
            "certification" => ["required", "max:1999", "image"],
        ], $messages);


        if ($request->hasFile('certification')) {
            $fileNameWithExt = $request->certification->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $fileExt = $request->certification->getClientOriginalExtension();

            $fileNameToUpload = $fileName . '_' . time() . '.' . $fileExt;

            $request->certification->storeAs('public/certifications', $fileNameToUpload);
        }
        $request->user()->certificates()->create([
            'image' => $fileNameToUpload
        ]);
        return redirect()->back();
    }
}
