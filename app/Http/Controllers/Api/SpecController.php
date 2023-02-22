<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spec;
use Illuminate\Http\Request;

class SpecController extends Controller
{
    public function getSpecs()
    {

        $specs = Spec::all();

        return response()->json(compact('specs'));
    }
}
