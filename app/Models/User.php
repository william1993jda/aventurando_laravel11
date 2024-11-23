<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function notes()
    {
//        relação de 1 para muitos com a model note
        return $this->hasMany(Note::class);
    }
}
