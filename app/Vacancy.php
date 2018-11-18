<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'title', 'description', 'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setUserAttribute($user)
    {
        $this->attributes['user_id'] = $user->id;
    }
}
