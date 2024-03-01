<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestelgegevens extends Model
{
    use HasFactory;

    protected $fillable = [
        'Adres',
        'Postcode',
        'Plaats',
        'Bdatum'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
