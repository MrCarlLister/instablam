<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function profileImage()
    {
        $imagePath  = ($this->image) ? $this->image : 'storage/fkzzhKVdtnPXWc382AjZGs8xYUDw3HRgfLQYk766.png';
        // dd($this);
        return '/storage/' .  $imagePath;
    }

    /**
     * Creates many-to-many relationship between followers and users
     *
     * @return void
     */
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * Find user id that profile belongs to
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
