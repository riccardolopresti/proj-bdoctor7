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

        //VOTI PER MESE
        $monthlyRatings = Rating::select( DB::raw("AVG(ratings.rating) as avg_ratings"), DB::raw("MONTH(created_at) as month_name"))
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->where('doctor_id', $doctor->id)
            ->groupBy('month_name')
            ->orderBy('month_name')
            ->get();

            $monthlyRatingsColl = [];

            foreach($monthlyRatings as $row) {
                $monthlyRatingsColl['data'][] = $row->avg_ratings;
                $monthlyRatingsColl['label'][] = $row->month_name;
            }

            $dataRm = $monthlyRatingsColl['data'];
            $labelsRm =  $monthlyRatingsColl['label'];

        //VOTI PER ANNO
        $yearlyRatings = Rating::select( DB::raw("AVG(ratings.rating) as avg_ratings"), DB::raw("YEAR(created_at) as year_name"))
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->where('doctor_id', $doctor->id)
            ->groupBy('year_name')
            ->orderBy('year_name')
            ->get();

            $yearlyRatingsColl = [];

            foreach($yearlyRatings as $row) {
                $yearlyRatingsColl['data'][] = $row->avg_ratings;
                $yearlyRatingsColl['label'][] = $row->year_name;
            }

            $dataRy = $yearlyRatingsColl['data'];
            $labelsRy =  $yearlyRatingsColl['label'];



        return view('admin.home', compact('dataRm','labelsRm','dataRy','labelsRy'));
    }
}
