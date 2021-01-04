<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Specialization;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    //Index
    public function index()
    {
        $services = Service::orderBy('service_name', 'asc')->paginate(10);
        return view('pages.admin.services', ['services' => $services]);
    }
    // Store
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => ['required', 'max:255', 'string']
        ]);
        Service::create([
            'service_name' => $request->service_name
        ]);
        return redirect()->back()->with('success', 'Service Added');
    }
    // Destroy
    public function destroy(Service $service)
    {
        $specializations = Specialization::where('name', $service->service_name)->get();

        if ($specializations->count()) {
            $specializations->each(function ($item, $key) {
                $item->delete();
            });
        }
        $service->delete();

        return redirect()->back()->with('success', "Service Deleted");
    }
}
