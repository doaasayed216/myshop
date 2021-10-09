<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required'],
            'body' => ['required']
        ]);

        Review::create($attributes);

        return back();
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete_review', $review);
        $review->delete();
        return back();
    }
}
