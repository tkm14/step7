<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{

    protected $fillable = [
        'name',
        'maker',
        'kakaku',
        'zaiko',
        'comment',
        'img_path',
    ];

    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }
}

