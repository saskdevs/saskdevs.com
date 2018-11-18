<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
      'name', 'website', 'user',
    ];

    public function setUserAttribute($user)
    {
        $this->attributes['user_id'] = $user->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
