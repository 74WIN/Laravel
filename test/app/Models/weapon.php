<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weapon extends Model
{
    protected $fillable = [
        'weaponname',
        'weapontype',
        'weaponimg',
        'weaponlore'
    ];
    use HasFactory;
}
