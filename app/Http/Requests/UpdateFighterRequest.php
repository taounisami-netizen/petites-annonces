<?php

namespace App\Http\Requests;

class UpdateFighterRequest extends StoreFighterRequest
{
    // Les règles de validation sont les mêmes qu'à la création (héritées),
    // on vérifie juste en plus que l'utilisateur connecté est bien le propriétaire
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('fighter'));
    }
}
