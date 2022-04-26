<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function stores(StoreRequest $request)
    {
        $stores = $this->store->getAll();
        return $stores;
    }
}
