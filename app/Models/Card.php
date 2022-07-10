<?php

namespace App\Models;

use App\Models\Components\Component;
use App\Models\Traits\UuidAsKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory, UuidAsKey;

    protected $primaryKey = "id";
    protected $keyType = "string";
    protected $guarded = [];

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
