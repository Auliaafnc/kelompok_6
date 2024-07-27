<?php

namespace App\Http\Requests;

use App\Models\Fasilitas;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFasilitasRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fasilita_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'detail' => [
                'string',
                'nullable',
            ],
        ];
    }
}
