<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    /**
     * fields need to be mass assignable
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'contact_no'];

    /**
     * parent model App\User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
