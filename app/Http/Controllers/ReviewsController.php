<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Review;

class ReviewsController extends Controller
{
    public function deleteReview($id) {
        Review::find($id)->delete();
        return redirect()->back();
    }

}
