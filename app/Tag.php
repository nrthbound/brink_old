<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }

}
