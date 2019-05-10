<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Question extends Model
{
    //
    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];
    //protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
