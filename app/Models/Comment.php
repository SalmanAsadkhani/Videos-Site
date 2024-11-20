<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory , Likeable;

    protected $fillable =
        [
            'user_id',
            'comment'
        ];
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedAtInHumasAttribute()
    {
        return (new Verta($this->created_at))->formatDifference();
    }

    public function getLowerNameAttribute()
    {
        return  Str::lower($this->video->comment->user->name);
    }

}
