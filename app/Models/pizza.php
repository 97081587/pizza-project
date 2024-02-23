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

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
