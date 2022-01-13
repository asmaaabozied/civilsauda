<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;
class Finance extends Model
{
    protected $table = "finances";
    protected $guarded = [];
    use HasUserStamps;
    use SoftDeletes;

    public function citizen()
    {

        return $this->belongsTo(Citizen::class,'citizen_id');

    }

    public function operation()
    {

        return $this->belongsTo(Operation::class, 'operation_id')->withDefault();

    }

}
