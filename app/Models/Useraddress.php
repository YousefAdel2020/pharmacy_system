<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "area_id",
        "street",
        "city",
        "country",
        "floor_num",
        "apartment_num",
        "is_primary_address"
    ];
}
