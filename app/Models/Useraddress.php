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
        "city",
        "country",
        "floor_num",
        "building_number",
        "apartment_num",
        "is_primary_address"
    ];
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}