<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'weaponname',
        'weapontype',
        'weaponimg',
        'weaponlore',
    ];
}


//    public function scopeFilter($query)
//    {
//        if (request('search'))
//        {
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }
//    }
//}
