<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{

    /**
     * get the parent post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
