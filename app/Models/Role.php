<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        "role_name",
        "role_permission",
        "dashboard",
        "niche",
        "collection",
        "design",
        "design_manage",
        "admin_design_manage",
        "role",
        "user",
        "role_status",
        "user_id",
        "role_name",
    ];
}
