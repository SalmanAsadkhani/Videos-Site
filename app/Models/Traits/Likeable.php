<?php

namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Comment;


trait Likeable {


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getlikeCountAttribute()
    {
        return $this->likes()
            ->where('vote' , 1)
            ->count();
    }
    public function getDislikeCountAttribute()
    {
        return $this->likes()
            ->where('vote' , -1)
            ->count();
    }

    public function LikeBy(User  $user)
    {

        if ($this->isLiked($user))
        {
            return $this->Likes()
                ->where('vote' , 1)
                ->delete();
        }


        return $this->Likes()->create([
           'vote' => 1,
           'user_id' => $user->id,
        ]);

    }



    public function disLikeBy(User  $user)
    {

        if ($this->isDisLiked($user))
        {
            return $this->Likes()
                ->where('vote' , -1)
                ->delete();

        }


        return $this->Likes()->create([
           'vote' => -1,
           'user_id' => $user->id,
        ]);

    }


    public function isLiked(User  $user)
    {
        return $this->likes()
            ->where('vote' , 1)
            ->where( 'user_id',$user->id  )
            ->exists();
    }


    public function isDisLiked(User  $user)
    {
        return $this->likes()
            ->where('vote' , -1)
            ->where( 'user_id',$user->id  )
            ->exists();
    }




}
