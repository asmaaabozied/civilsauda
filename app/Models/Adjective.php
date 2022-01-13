<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Adjective extends Model
{
    protected $table = "adjectives";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;

    public function getNameAttribute() {
        return ( app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
