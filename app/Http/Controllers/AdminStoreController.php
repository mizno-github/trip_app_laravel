<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class AdminStoreController extends Controller
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function getAll(Request $request)
    {
        $userId = $request->user()->id;
        return $this->store->getByUserId($userId);
    }

    public function get(Request $request)
    {
        $userId = $request->user()->id;
        $store = $this->store->getByStoreIdAndUserId($request->storeId, $userId);

        if ($store) {
            return $store;
        } else {
            return response('エラーが発生しました', 400);
        }
    }
}
