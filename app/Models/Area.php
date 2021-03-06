<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function getAll()
    {
        return $this->get();
    }

    public function getByAreaId($areaId)
    {
        return $this->findOrFail($areaId);
    }

    public function getLatAndLon()
    {
        return $this
            ->select([
                'id',
                'lat',
                'lon',
            ])
            ->get();
    }
}
