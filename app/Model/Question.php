<?php

namespace App\Model;

use App\User;
use App\Model\Reply;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];
    protected $guarded = [];

    public function user()//question belongs to a user
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()//question belongs to a user
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
