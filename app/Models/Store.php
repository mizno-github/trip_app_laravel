<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function getAll()
    {
        return $this->select([
            'id',
            'message',
            'main_img',
        ])->get();
    }
}
