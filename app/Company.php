<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'website', 'user', 'photo', 'slug', 'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
