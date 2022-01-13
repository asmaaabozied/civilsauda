<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Citizen extends Model
{
    protected $table = "citizens";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;

    public function addresses()
    {

        return $this->hasMany(Address::class);

    }
    public function Finances()
    {

        return $this->hasMany(Finance::class);

    }

    public function getFirstNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->first_name_ar .' ' .''. $this->second_name_ar.' ' .''.$this->third_name_ar.' ' .''.$this->fourth_name_ar : $this->first_name_en.' ' .''.$this->second_name_en.' ' .''.$this->third_name_en.' ' .''.$this->fourth_name_en ;
    }

    public function gurantors()
    {

        return $this->hasMany(Gurantor::class);

    }
    public function tripe()
    {

        return $this->belongsTo(Tribe::class,'tribe_id')->withDefault();

    }
    public function descent()
    {

        return $this->belongsTo(Descent::class,'descent_id')->withDefault();

    }
    public function arithmetic()
    {

        return $this->belongsTo(Arithmetic::class,'arithmetic_id')->withDefault();

    }


    public function job()
    {

        return $this->belongsTo(Job::class)->withDefault();

    }
    public function country()
    {

        return $this->belongsTo(Job::class,'country_id')->withDefault();

    }
    public function city()
    {

        return $this->belongsTo(Job::class,'city_id')->withDefault();

    }
    public function adjective()
    {

        return $this->belongsTo(Adjective::class,'adjective_id')->withDefault();

    }

}
