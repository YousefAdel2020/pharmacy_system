<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Doctor;

class Pharmacy extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'national_id',
        'avatar',
        
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
   /* public function pharmacies()
    {
        return $this->hasMany(Doctor::class);
    }
    
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }*/
}
