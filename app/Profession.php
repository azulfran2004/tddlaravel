<?php

namespace App;

use App\Filters\ProfessionFilter;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['title'];

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function newQueryFilter()
    {
        return new ProfessionFilter;
    }

}
