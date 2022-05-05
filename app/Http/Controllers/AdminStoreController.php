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
}
