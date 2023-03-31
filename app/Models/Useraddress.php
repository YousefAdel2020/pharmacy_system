<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    use HasFactory;
    protected $table = 'user_address';
    protected $fillable = [
        "user_id",
        "area_id",
        "street",
        "area",
        "country",
        "floor_num",
        "apartment_num",
        "is_primary_address"
    ];
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}