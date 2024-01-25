<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design_Images extends Model
{
    public function niche()
    {
        return $this->belongsTo(Niche::class, 'niche_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }
    use HasFactory;
    protected $fillable = [
        "design_images",
        "design_file_path",
        "design_date",
        "niche_id",
        "collection_id",
        "brand_name",
        "title",
        "bullet_point_1",
        "bullet_point_2",
        "description",
        "admin_approval",
        "denied_reason",
        "user_id",
    ];
}
