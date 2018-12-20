<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Auth;
use App\Wine;

class UserIndexController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('user.index')->with([
            'user' => $user
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $wines = Wine::orderBy('name')->get();

        return view('user.reviews.create')->with([
            'user' => $user,
            'wines' => $wines
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        # Only calculate converted amount if form is submitted and valid.
        $request->validate([
            'wine' => 'required',
            'rating' => 'required|between:1.0,5.0',
            'review' => 'required'
        ]);

        # Save new review
        $review = new Review();
        $review->wind_id = $request->wine;
        $review->user_id = $user->id;
        $review->comment = $request->review;
        $review->save();

        # Redirect back to add
        return redirect('/user/home')->with([
            'alert' => 'Review added.',
            'success' => true
        ]);
    }
}
