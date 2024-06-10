<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockupDesign extends Model
{
    use HasFactory;
    protected  $fillable=[
        "mokup_id",
        "template_id",
        "design_id",
        "mokup_current_width",
        "mokup_current_height",
        "position_x",
        "position_y",
        "design_width",
        "design_height",
        "designed_mokup",
        "mokup_status",
    ];
}


