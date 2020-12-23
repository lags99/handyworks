<?php

namespace App\Http\Controllers;

use App\Mail\ScheduleInterview;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Interview;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class InterviewController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    public function index()
    {

        $interviews = Interview::orderBy('created_at', 'desc')->with(['user'])->paginate(10);
        $interviews->transform(function ($item, $key) {
            $interview = Interview::find($item->id);
            $time = Carbon::parse($interview->interview_date);
            if ($time->isPast()) {
                $interview->status = "Cancelled";
                $interview->save();

                return $interview;
            }
            return $item;
        });


        return view('auth.admin.interviews', ['interviews' => $interviews]);
    }

    public function store(User $user, Request $request)
    {
        $this->validate($request, [
            "year" => ['required', 'min:' . date('Y'), 'numeric'],
            "month" => ['required', 'max:12', 'numeric'],
            "day" => ['required', 'max:31', 'numeric'],
            "hour" => ['required', 'max:12', 'numeric'],
            "minute" => ['required', 'max:59', 'numeric'],
            "ampm" => ['required', 'string'],
        ]);
        $time = Carbon::parse($request->year . "-" . $request->month . "-" . $request->day . " " . $request->hour . ":" . $request->minute . " " . $request->ampm);

        if ($time->isPast()) {
            return redirect()->back()->with('error', 'Date had already passed.');
        }
        $time->format('Y-m-d H:i:s');
        $user->interview()->create([
            'interview_date' => $time
        ]);
        Mail::to($user)->send(new ScheduleInterview($user));
        return redirect(route('interviews'))->with('success', "Interview Set Successfully");
    }
    public function update(User $user, Request $request)
    {
        $user->status = $request->status;
        $user->interviewed = $user->interview->interview_date;
        $user->interview->status = "Done";
        $user->interview->save();
        $user->save();

        return redirect()->back()->with('success', "User Marked Successfully");
    }
}
