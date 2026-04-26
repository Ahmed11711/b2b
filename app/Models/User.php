<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use \App\Models\Category;
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

    public array $searchable = ['email', 'name', 'phone'];
    public array $filterable = ['is_active', 'role', 'social_type', 'social_id', 'city_id'];
    public array $allowedFields = ['id', 'name', 'email', 'phone', 'user_name', 'image', 'whtsapp', 'country_code', 'is_active', 'email_verified_at', 'role', 'social_type', 'social_id', 'city_id', 'info', 'last_login_at', 'created_at', 'updated_at'];



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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_user');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function certificates()
    {
        return $this->hasMany(MyCertificate::class);
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function reviews()
    {
        return $this->hasMany(ServiceReviews::class, 'provider_id');
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    public function package()
    {
        return $this->hasOne(UserPacakges::class)->where('active', 1)->latest();
    }

    public function Allpackage()
    {
        return $this->hasMany(UserPacakges::class, 'user_id');
    }

    /////////////////////////////////All Relation Provider////////////////////////////
    public function UserContact()
    {
        return $this->hasMany(UserContact::class, 'user_id');
    }
    public function verification()
    {
        return $this->hasMany(Verification::class);
    }

    // App/Models/User.php

    public function getProfileCompletion(): array
    {
        $fields = [
            'name'         => $this->name,
            'email'        => $this->email,
            'phone'        => $this->phone,
            'user_name'    => $this->user_name,
            'whtsapp'      => $this->whtsapp,
            'country_code' => $this->country_code,
            'is_verified'  => $this->is_verified,
        ];

        $completed = array_filter($fields, fn($val) => !is_null($val) && $val !== '' && $val !== false);
        $percentage = (int) round((count($completed) / count($fields)) * 100);

        return [
            'percentage'       => $percentage,
            'completed_fields' => array_keys($completed),
            'missing_fields'   => array_keys(array_diff_key($fields, $completed)),
        ];
    }
}
