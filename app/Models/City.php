<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class City extends Model
{
    protected $table = "cities";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;

    public function province()
    {

        return $this->belongsTo(Province::class, 'province_id')->withDefault();

    }
    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
