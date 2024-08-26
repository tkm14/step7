<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
public function getMaker()
   {
        $makers = Maker::pluck('maker', 'id');
        return $makers;
    }

    public function juices(){
        return $this->hasMany(Juice::class);
    }
}
