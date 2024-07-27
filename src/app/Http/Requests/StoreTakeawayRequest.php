<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreTakeawayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('takeaway_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'waktu_takeaway' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'keterangan_tambahan' => [
                'string',
                'required',
            ],
            'pembayaran' => [
                'string',
                'required',
            ],
            'products' => [
                'required',
                'array',
            ],
            'products.*' => [
                'integer',
            ],
            'quantities' => [
                'required',
                'array',
            ],
            'quantities.*' => [
                'integer',
                'min:1',
            ],
        ];
    }
}
