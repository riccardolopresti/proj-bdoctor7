<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('id','desc')->get();
        $reviews = Review::paginate(10);

        $user_logged =  Auth()->user()->doctors;

        return view('admin.reviews.index', compact('reviews', 'doctors','user_logged'));
    }

    public function create(Review $review)
    {
        return view('admin.reviews.create', compact('review'));
    }

    public function store(Request $request)
    {

    $last_id = DB::table('doctors')->latest('created_at')->first();

    $max_id = $last_id->user_id;

        $form_data = $request->validate(
            [
                'name' => 'required|min:2|max:255',
                'doctor_id' => "required|numeric|max:$max_id",
                'text' => 'required|min:2'
            ]
        );

        $review = Review::create($form_data);

        return redirect()->route('admin.reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('message', 'Review eliminata correttamente');
    }
}
