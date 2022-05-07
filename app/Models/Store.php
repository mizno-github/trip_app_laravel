<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_title',
        'name',
        'area_id',
        'user_id',
        'other_address',
        'tel',
        'fax',
        'eigyo_time',
        'access',
        'message',
        'detail_text',
        'main_img',
        'sub_img',
    ];

    public function getByStoreId($storeId)
    {
        return $this->find($storeId);
    }

    public function getByStoreIdAndUserId($storeId, $userId)
    {
        return $this->where([
            ['id', $storeId],
            ['user_id', $userId]
        ])->first();
    }

    public function create($request)
    {
        return $this->fill($request)->save();
    }

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

    public function updateByStoreId($storeId, $storeContent, $userId)
    {
        $target = $this->where([
            ['id', $storeId],
            ['user_id', $userId],
        ])->first();

        return $target->update($storeContent);
    }

    public function hardDelete($userId, $storeId)
    {
        return $this
            ->where([
                ['id', $storeId],
                ['user_id', $userId],
            ])
            ->first()
            ->delete();
    }
}
