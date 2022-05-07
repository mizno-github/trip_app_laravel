<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Models\Area;

class StoreController extends Controller
{
    protected $store;
    protected $area;

    public function __construct(Store $store, Area $area)
    {
        $this->store = $store;
        $this->area = $area;
    }

    public function getDetail(Request $request)
    {
        return $this->store->getByStoreId($request->storeId);
    }

    public function stores(StoreRequest $request)
    {
        $areaId = $request->areaId;
        $scope = $request->scope;

        if ($request->type === 'random') {
            return $this->store->getRand(10);
        } elseif ($scope > 1) {
            return $this->getStoresByAreaIdAndScope($areaId, $scope);
        } else {
            return $this->store->getByAreaId($areaId);
        }
    }

    public function getStoresByAreaIdAndScope($areaId, $scope)
    {
        $areas = $this->area->getLatAndLon();
        $targetArea = $areas->firstWhere('id', $areaId);
        $targetLat = $targetArea->lat;
        $targetLon = $targetArea->lon;
        $stores = collect();

        // 三平方の定理よりユークリッド距離を求める
        $areas = $areas->map(function ($area) use ($targetLat, $targetLon) {
            $a = $targetLat - $area->lat;
            $b = $targetLon - $area->lon;
            $area->dif = $a ** 2 + $b ** 2;
            return ['id' => $area->id, 'dif' => $a ** 2 + $b ** 2];
        });

        $areas = $areas->sortBy('dif')->take($scope)->pluck('id');

        foreach ($areas as $area) {
            $areasStores = $this->store->getByAreaId($area);
            $stores->push($areasStores->toArray());
        }

        return $stores->filter();
    }
}
