<?php

namespace App\Http\Requests;

use App\Models\Benner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBennerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('benner_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
