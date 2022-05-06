<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\StoreUpdateRequest;

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

    public function update(StoreUpdateRequest $request)
    {
        $storeContent = $request->all();
        $userId = $request->user()->id;

        if (isset($request->main_img)) {
            $imgName = $this->saveImg($request->main_img);
            $storeContent['main_img'] = $imgName;
        }

        if (isset($request->sub_img)) {
            $imgName = $this->saveImg($request->sub_img);
            $storeContent['sub_img'] = $imgName;
        }


        $result = $this->store->updateByStoreId($request->storeId, $storeContent, $userId);

        if ($result) {
            return response('編集が完了しました', 200);
        } else {
            return response('エラーが発生しました', 400);
        }
    }

    protected function saveImg($uploadedFile)
    {
        // s3にイメージを保存する
        $imgName = $uploadedFile->getClientOriginalName();
        return $imgName;
    }
}
