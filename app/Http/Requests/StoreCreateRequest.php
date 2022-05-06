<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateRequest extends ApiRequest
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
            'message' => 'required|max:10',
            'detail_title' => 'required|max:15',
            'name' => 'required|max:25',
            'area_id' => 'required|digits_between:4,5|integer',
            'other_address' => 'required|max:120',
            'tel' => 'filled|numeric',
            'fax' => 'filled|numeric',
            'eigyo_time' => 'filled|max:120',
            'access' => 'filled|max:120',
            'detail_text' => 'required|min:10',
            'main_img' => 'required|file',
            'sub_img' => 'filled|file',
        ];
    }
}
