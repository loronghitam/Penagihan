<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alamat',
        'package_id',
        'status',
        'alamat'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function package()
    {
        return $this->hasMany(Package::class, 'id', 'package_id');
    }
    public function bill()
    {
        return $this->hasMany(Bill::class, 'join_id', 'id');
    }
}
