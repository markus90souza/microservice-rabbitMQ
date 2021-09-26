<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $uuid = $this->company;
        return [
            'category_id'   => [
                'required',
                'exists:categories,id'
            ],
            'name'          => [
                'required',
                "unique:companies,name,{$uuid},uuid"
            ],
            'whatsapp'      => [
                'required',
                "unique:companies,name,{$uuid},uuid"
            ],
            'email'         => [
                'required',
                'email',
                "unique:companies,name,{$uuid},uuid"
            ],
            'phone'         => [
                'nullable',
                "unique:companies,name,{$uuid},uuid"
            ],
            'facebook'      => [
                'nullable',
                "unique:companies,name,{$uuid},uuid"
            ],
            'instagram'     => [
                'nullable',
                "unique:companies,name,{$uuid},uuid"
            ],
            'youtube'       => [
                'nullable',
                "unique:companies,name,{$uuid},uuid"
            ],
        ];
    }
}
