<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'token',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
