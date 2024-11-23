<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    public function user()
    {
//        pertence a model user, relacionando as notas ao user
        return $this->belongsTo(User::class);
    }
}
