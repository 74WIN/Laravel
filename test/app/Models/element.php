<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class element extends Model
{
    protected $fillable = [
        'elementname',
        'elementtype',
        'elementimg',
        'elementlore',
    ];
    use HasFactory;
}
