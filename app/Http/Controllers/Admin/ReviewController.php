<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $reviews = Review::paginate(10);
        return view('admin.reviews.index', compact('reviews', 'doctors'));
    }

    public function create(Review $review)
    {
        return view('admin.reviews.create', compact('review'));
    }

    public function store(Request $request)
    {
        $form_data = $request->all();
        // dd($form_data);

        Review::create($form_data);

        return redirect()->route('admin.reviews.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('message', 'Review eliminata correttamente');
    }
}
