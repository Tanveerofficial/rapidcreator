<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[
        "template_picture",
        "date",
        'container_position_top',
        'container_position_left',
        'container_width',
        'container_height',
        'input_position_top',
        'input_position_left',
        'input_width',
        'input_height',
        'input_font_size',
        "added_from",
    ];
}
