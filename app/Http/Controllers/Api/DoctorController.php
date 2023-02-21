<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Spec;
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

        $filteredDoctors = Spec::where('type', 'like', $spec)->with(['doctors'])->get();

        return response()->json(compact('filteredDoctors'));
    }
}
