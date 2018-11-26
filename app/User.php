<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function isOnCompany($companyId)
    {
        if ($companyId instanceof Company) {
            $companyId = $companyId->id;
        }

        return $this->companies()->get()->map->id->contains($companyId);
    }
}
