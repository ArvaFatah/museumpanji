<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualTourDetail extends Model
{
    protected $fillable = [
        'virtual_tour_id_from', 
        'virtual_tour_id_to',
        'x_axis',
        'y_axis',
        'z_axis',
        'status',
    ];
}
