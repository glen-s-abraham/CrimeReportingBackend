<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
class Station extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function district()
    {
        return $this->hasOne(District::class,'district_id');
    }
}
