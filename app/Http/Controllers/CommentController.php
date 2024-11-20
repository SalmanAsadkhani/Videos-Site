<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function  store(request $request ,Video  $video)
    {
        $video->comments()->create([
            'user_id' => auth()->id(),
            'comment' => request('comment')
        ]);

        return back()->with('alert' , ("message.send"));
   }
}
