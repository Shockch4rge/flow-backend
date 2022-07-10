<?php

namespace App\Models\Components;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Component
{
    public function items(): HasMany
    {
        return $this->hasMany(ChecklistItem::class);
    }
}
