<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Spec;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['user', 'specs'])->paginate(10);
        return response()->json(compact('doctors'));
    }

    public function filterDoctors($spec)
    {

        $filteredDoctors = Doctor::with(['user', 'reviews', 'messages', 'ratings'])->whereHas('specs', function ($query) use ($spec) {
            $query->where('specs.type', $spec);
        })->get();

        return response()->json(compact('filteredDoctors'));
    }
}
