<?php

namespace App\Policies;

use App\Models\Fighter;
use App\Models\User;

class FighterPolicy
{
    // Seul le propriétaire du profil peut le modifier
    public function update(User $user, Fighter $fighter): bool
    {
        return $user->id === $fighter->user_id;
    }

    // ... et le supprimer
    public function delete(User $user, Fighter $fighter): bool
    {
        return $user->id === $fighter->user_id;
    }
}
