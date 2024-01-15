<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{   
    protected $table = 'pizzas';

    protected $primaryKey = 'id';

    public $timestamps = true;
}
