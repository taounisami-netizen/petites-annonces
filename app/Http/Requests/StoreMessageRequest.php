<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    // On passe par la policy : pas de message à soi-même ni à un combattant indisponible
    public function authorize(): bool
    {
        return $this->user()->can('contact', $this->route('fighter'));
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }
}
