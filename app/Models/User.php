<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements JWTSubject
{

    public array $searchable = ['remember_token'];
    public array $filterable = ['is_active', 'role', 'social_type', 'social_id'];
    public array $allowedFields = ['id', 'name', 'email', 'phone', 'country_code', 'is_active', 'email_verified_at', 'role', 'social_type', 'social_id', 'last_login_at', 'created_at', 'updated_at'];



    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'user_id' => $this->id,
            'email'   => $this->email ?? null,
            'role'    => $this->role ?? null,
        ];
    }

    public function social()
    {
        return $this->belongsTo(Social::class, 'social_id');
    }

}