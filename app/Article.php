<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;

class Article extends Model
{

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')->withTimestamps();
    }
}
