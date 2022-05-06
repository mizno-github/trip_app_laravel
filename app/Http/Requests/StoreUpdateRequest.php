<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'filled|max:10',
            'detail_title' => 'filled|max:15',
            'name' => 'filled|max:25',
            'area_id' => 'filled|digits_between:4,5|integer',
            'other_address' => 'filled|max:120',
            'tel' => 'filled|numeric',
            'fax' => 'filled|numeric',
            'eigyo_time' => 'filled|max:120',
            'access' => 'filled|max:120',
            'detail_text' => 'filled|min:10',
            'main_img' => 'filled|file',
            'sub_img' => 'filled|file',
        ];
    }
}
