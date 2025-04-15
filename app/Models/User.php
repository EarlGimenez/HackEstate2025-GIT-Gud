<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'is_broker',
        'is_agent',
        'is_buyer',
        'license_number',
        'license_expiration_date',
        'agency_name',
        'phone_number',
        'terms_agreed'
    ];
    // 'username'=>['required'],
    // 'firstname' => ['required', 'string', 'max:100'],
    // 'lastname' => ['required', 'string', 'max:100'],
    // 'email' => ['required', 'email', 'unique:users,email'],
    // 'password' => ['required', 'string', 'min:8'],
    // 'is_broker' => ['required', 'boolean'],
    // 'is_agent' => ['required', 'boolean'],
    // 'is_buyer' => ['required', 'boolean'],
    // 'license_number' => ['required_if:is_broker,true,is_agent,true', 'string'],
    // 'license_expiration_date' => ['required_if:is_broker,true,is_agent,true', 'date'],
    // 'agency_name' => ['required_if:is_broker,true,is_agent,true', 'string'],
    // 'phone_number' => ['required', 'regex:/^[0-9]{10,15}$/'],
    // 'terms_agreed' => ['required', 'accepted'],
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
