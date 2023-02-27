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

    
        $record = Rating::select(DB::raw('ratings.rating as rating'), DB::raw("COUNT(ratings.rating) as count_ratings"), DB::raw("MONTH(created_at) as month_name"))
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->where('doctor_id', $doctor->id)
            ->groupBy('month_name','rating')
            ->orderBy('month_name')
            ->get();

            $collections = [];

            foreach($record as $row) {
                $collections['data'][] = (int) $row->count_ratings;
                $collections['label'][] = $row->rating;
                $collections['month'][] = (int) $row->month_name;
            }

            $labels =  $collections['label'];
            $data = $collections['data'];
            $month = $collections['month'];

        return view('admin.home', compact('labels','data','month','record'));
    }
}
