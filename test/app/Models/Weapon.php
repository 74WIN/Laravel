<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapons';
    protected $fillable = [
        'weaponname',
        'weapontype_id',
        'weaponimg',
        'weaponlore',
    ];

    public function weapontype()
    {
        return $this->belongsTo(Weapontype::class);
    }

    public function scopeFilter($query)
    {
        if (request('search'))
        {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
    }
}
