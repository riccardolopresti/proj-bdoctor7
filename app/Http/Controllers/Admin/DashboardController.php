<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $user_logged =  Auth()->user()->doctors->ratings;

        $labels = $user_logged->keys();
        $data = $user_logged->values();

        return view('admin.home', compact('labels','data'));
    }
}
