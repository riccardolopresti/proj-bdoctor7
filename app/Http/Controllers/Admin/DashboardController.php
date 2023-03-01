<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Rating;
use App\Models\Review;
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

            if(count($monthlyRatings)>0){
                $monthlyRatingsColl = [];

                foreach($monthlyRatings as $row) {
                    $monthlyRatingsColl['data'][] = $row->avg_ratings;
                    $monthlyRatingsColl['label'][] = $row->month_name;
                }

                $dataRm = $monthlyRatingsColl['data'];
                $labelsRm =  $monthlyRatingsColl['label'];
                $rating="";

            }else{
                $rating="Non hai ancora ricevuto valutazioni";
                $dataRm = 0;
                $labelsRm =  0;
            }



        //VOTI PER ANNO
        $yearlyRatings = Rating::select( DB::raw("AVG(ratings.rating) as avg_ratings"), DB::raw("YEAR(created_at) as year_name"))
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->where('doctor_id', $doctor->id)
            ->groupBy('year_name')
            ->orderBy('year_name')
            ->get();

            if(count($monthlyRatings)>0){
                $yearlyRatingsColl = [];

                foreach($yearlyRatings as $row) {
                    $yearlyRatingsColl['data'][] = $row->avg_ratings;
                    $yearlyRatingsColl['label'][] = $row->year_name;
                }

                $dataRy = $yearlyRatingsColl['data'];
                $labelsRy =  $yearlyRatingsColl['label'];
                $rating="";
            }else{
                $rating="Non hai ancora ricevuto valutazioni";
                $dataRy = 0;
                $labelsRy =  0;
            }



            //MESSAGGI PER MESE
            $monthlyMsg = Message::select( DB::raw("COUNT(messages.id) as msg_count"), DB::raw("MONTH(created_at) as month_name"))
            ->where('doctor_id', $doctor->id)
            ->groupBy('month_name')
            ->orderBy('month_name')
            ->get();

            if(count($monthlyMsg)>0){
                $monthlyMsgColl = [];

                foreach($monthlyMsg as $row) {
                    $monthlyMsgColl['data'][] = $row->msg_count;
                    $monthlyMsgColl['label'][] = $row->month_name;
                }

                $dataMm = $monthlyMsgColl['data'];
                $labelsMm =  $monthlyMsgColl['label'];
                $message="";
            }else{
                $dataMm = 0;
                $labelsMm = 0;
                $message="Non hai ancora ricevuto messaggi";
            }




            //MESSAGGI PER ANNO
            $yearlyMsg = Message::select( DB::raw("COUNT(messages.id) as msg_count"), DB::raw("YEAR(created_at) as year_name"))
            ->where('doctor_id', $doctor->id)
            ->groupBy('year_name')
            ->orderBy('year_name')
            ->get();

            if(count($yearlyMsg)>0){
                $yearlyMsgColl = [];

                foreach($yearlyMsg as $row) {
                    $yearlyMsgColl['data'][] = $row->msg_count;
                    $yearlyMsgColl['label'][] = $row->year_name;
                }

                $dataMy = $yearlyMsgColl['data'];
                $labelsMy =  $yearlyMsgColl['label'];
                $message="";
            }else{
                $message="Non hai ancora ricevuto messaggi";
                $dataMy = 0;
                $labelsMy =  0;
            }




            //  RECENSIONI PER MESE
            $monthlyReviews = Review::select( DB::raw("COUNT(reviews.id) as reviews_count"), DB::raw("MONTH(created_at) as month_name"))
            ->where('doctor_id', $doctor->id)
            ->groupBy('month_name')
            ->orderBy('month_name')
            ->get();

            if(count($monthlyReviews)>0){
                $monthlyReviewsColl = [];

                foreach($monthlyReviews as $row) {
                    $monthlyReviewsColl['data'][] = $row->reviews_count;
                    $monthlyReviewsColl['label'][] = $row->month_name;
                }

                $dataRwM = $monthlyReviewsColl['data'];
                $labelsRwM =  $monthlyReviewsColl['label'];
                $review="";
            }else{
                $review="Non hai ancora ricevuto recensioni";
                $dataRwM = 0;
                $labelsRwM =  0;
            }



            //RECENSIONI PER ANNO
            $yearlyReviews = Review::select( DB::raw("COUNT(reviews.id) as reviews_count"), DB::raw("YEAR(created_at) as year_name"))
            ->where('doctor_id', $doctor->id)
            ->groupBy('year_name')
            ->orderBy('year_name')
            ->get();

            if(count($yearlyReviews)>0){
                $yearlyReviewsColl = [];

                foreach($yearlyReviews as $row) {
                    $yearlyReviewsColl['data'][] = $row->reviews_count;
                    $yearlyReviewsColl['label'][] = $row->year_name;
                }

                $dataRwY = $yearlyReviewsColl['data'];
                $labelsRwY =  $yearlyReviewsColl['label'];
                $review="";
            }else{
                $review="Non hai ancora ricevuto recensioni";
                $dataRwY = 0;
                $labelsRwY =  0;
            }


        return view('admin.home', compact('dataRm','labelsRm','dataRy','labelsRy','dataMm','labelsMm','dataMy','labelsMy','dataRwM','labelsRwM','dataRwY','labelsRwY', 'message', 'rating', 'review'));
    }
}
