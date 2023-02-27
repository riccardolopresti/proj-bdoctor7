<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $doctor=Doctor::where('user_id', Auth::user()->id)->first();
        $stat_rating = $doctor->ratings()->get();

    
        $record = Rating::select(DB::raw("COUNT(ratings.rating) as rating"), DB::raw("MONTH(created_at) as Month_name"))
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->where('doctor_id', $doctor->id)
            ->groupBy('Month_name','rating')
            ->orderBy('Month_name')
            ->get();

        return view('admin.home', compact('record'));
    }
}
