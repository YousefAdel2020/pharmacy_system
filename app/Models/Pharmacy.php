<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pharmacy extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'avatar',
        'priority',
        'is_deleted'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }
}
