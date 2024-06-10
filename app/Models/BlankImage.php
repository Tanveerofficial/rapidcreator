<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlankImage extends Model
{
    use HasFactory;
    protected $fillable=[
        "position_x",
        "position_y",
        "container_width",
        "container_height",
        "image_width",
        "image_height",
        "image_path",
        "added_from",
    ];
}
