<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapontype extends Model
{
    use HasFactory;
    protected $table = 'weapontypes';
    public function weapon()
    {
        return $this->belongsToMany(Weapon::class);
    }

}
