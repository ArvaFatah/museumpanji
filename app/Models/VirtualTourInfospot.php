<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualTourInfospot extends Model
{
    protected $fillable = [
        'virtual_tour_id_from', 
        'judul',
        'keterangan',
        'foto',
        'x_axis',
        'y_axis',
        'z_axis',
        'status',
    ];
}
