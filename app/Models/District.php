<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Station;

class District extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function station()
    {
        $this->belongsToMany(Station::class);
    }
}
