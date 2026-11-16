<?php

namespace App\Http\Requests;

use App\Enums\FightingStyle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreFighterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'min:3', 'max:80'],
            'city_id'     => ['required', 'exists:cities,id'],
            'style'       => ['required', Rule::enum(FightingStyle::class)],
            'price'       => ['required', 'numeric', 'min:10', 'max:1000'],
            'wins'        => ['required', 'integer', 'min:0', 'max:500'],
            'losses'      => ['required', 'integer', 'min:0', 'max:500'],
            'description' => ['required', 'string', 'min:20', 'max:2000'],
        ];
    }
}