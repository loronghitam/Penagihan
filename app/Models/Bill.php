<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_join',
        'tanggal_tagihan',
        'payment',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function joins()
    {
        return $this->belongsTo(Join::class, 'join_id', 'id');
    }
}
