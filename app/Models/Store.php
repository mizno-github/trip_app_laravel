<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function getByAreaId($areaId)
    {
        return $this->whereArea_id($areaId)->get();
    }

    public function getByUserId($userId)
    {
        return $this
                ->whereUser_id($userId)
                ->select([
                    'id',
                    'name',
                    'main_img',
                    'detail_text',
                ])
                ->get();
    }

    public function getRand($hits)
    {
        return $this
            ->inRandomOrder()
            ->take($hits)
            ->select([
                'id',
                'message',
                'main_img',
            ])
            ->get();
    }
}
