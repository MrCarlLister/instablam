<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = [];
    /**
     * Posts belonging to user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
