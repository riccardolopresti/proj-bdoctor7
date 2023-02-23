<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['user', 'specs'])->paginate(10);
        return response()->json(compact('doctors'));
    }

    public function filterDoctors($spec)
    {
        $doc_ratings = DB::table('ratings')
            ->join('doctor_rating', 'ratings.id', '=', 'doctor_rating.rating_id')
            ->select('doctor_id')
            ->selectRaw('AVG(ratings.rating) AS average_rating')
            ->groupBy('doctor_id')
            ->get();



        $filteredDoctors = Doctor::with(['user', 'reviews', 'messages', 'ratings', 'offers'])->whereHas('specs', function ($query) use ($spec) {
            $query->where('specs.type', $spec);
        })->get();

        return response()->json(compact('filteredDoctors', 'doc_ratings'));
    }

    public function show($slug){
        $doctor = Doctor::where('slug', $slug)->with(['user', 'reviews', 'messages', 'ratings', 'offers'])->first();

        return response()->json($doctor);
    }
}
