<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'avatar',
        'is_banned',
        'pharmacy_id'
    ];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = date('d-m-Y', strtotime($value));
    }

    public function pharmacies(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
}