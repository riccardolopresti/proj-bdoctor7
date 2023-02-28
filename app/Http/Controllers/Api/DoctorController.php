<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /*public function index()
    {
        $doctors = Doctor::with(['user', 'specs'])->paginate(10);
        return response()->json(compact('doctors'));
    }*/

    public function filterDoctors($spec)
    {
        $sponsorFilteredDocs = Doctor::with(['user', 'reviews', 'messages', 'ratings', 'offers', 'specs'])->whereHas('offers', function ($q) {
            date_default_timezone_set('Europe/Rome');
            $now = date("Y-m-d H:i:s");

            $q->where('end_at', '>=', $now);
        })->whereHas('specs', function ($query) use ($spec) {
            $query->where('specs.type', $spec);
        })->paginate(12);

        $notSponsorFilteredDocs = Doctor::with(['user', 'reviews', 'messages', 'ratings', 'offers', 'specs'])->whereDoesntHave('offers', function ($q) {
            date_default_timezone_set('Europe/Rome');
            $now = date("Y-m-d H:i:s");

            $q->where('end_at', '>=', $now);
        })->whereHas('specs', function ($query) use ($spec) {
            $query->where('specs.type', $spec);
        })->paginate(8);

        $doc_ratings = DB::table('ratings')
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->select('doctor_id')
            ->selectRaw('AVG(ratings.rating) AS average_rating')
            ->groupBy('doctor_id')
            ->get();

        return response()->json(compact('sponsorFilteredDocs', 'notSponsorFilteredDocs', 'doc_ratings'));
    }
    public function sponsorDoc()
    {
        $sponsorDocs = Doctor::with(['user', 'reviews', 'messages', 'ratings', 'offers','specs'])->whereHas('offers', function ($q) {
            date_default_timezone_set('Europe/Rome');
            $now = date("Y-m-d H:i:s");

            $q->where('end_at', '>=', $now);
        })->paginate(12);

        $doc_ratings = DB::table('ratings')
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->select('doctor_id')
            ->selectRaw('AVG(ratings.rating) AS average_rating')
            ->groupBy('doctor_id')
            ->get();

        return response()->json(compact('sponsorDocs', 'doc_ratings'));
    }

    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->with(['user', 'specs', 'reviews', 'messages', 'ratings', 'offers'])->first();

        return response()->json($doctor);
    }
}
