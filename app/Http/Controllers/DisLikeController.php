<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisLikeController extends Controller
{
    public function store(Request $request , string $likeable_type, $likeable_id)
    {
        $likeable_id->disLikeBy(auth()->user());

        return back();
    }
}
