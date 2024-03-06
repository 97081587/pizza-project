<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{   
    use HasFactory;

    protected $fillable = [
        'HawaiiList',
        'FunghiList',
        'MargheritaList',
        'MarinaList',
        'QFormaggiList'
    ];

    public function pizzas()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
