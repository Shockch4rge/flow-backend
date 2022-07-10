<?php

namespace App\Models;

use App\Models\Traits\UuidAsKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, UuidAsKey, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        "username",
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    protected $primaryKey = "id";
    protected $keyType = "string";
    protected $guarded = [];

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class, "author_id");
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
