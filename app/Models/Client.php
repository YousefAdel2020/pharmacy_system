<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'email', 'password','gender','mobile','avatar','national_id','birth_day','password',
    ];
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }
}
