<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function  store(StoreCommentRequest  $request,Video  $video)
    {
        $video->comments()->create([
            'user_id' => auth()->id(),
            'comment' => Request('comment')
        ]);

        return back()->with('alert' , ("message.comment_created"));
   }
}
