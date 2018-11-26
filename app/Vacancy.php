<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user',
        'company',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function setUserAttribute($user)
    {
        $this->attributes['user_id'] = $user->id;
    }

    public function setCompanyAttribute($company)
    {
        $this->attributes['company_id'] = $company->id;
    }
}
