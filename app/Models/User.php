<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    





    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, 'https://test.wsiddiquesolutions.com') && $this->hasVerifiedEmail();
    }

    // Define the relationship with transactions
    // public function agent()
    // {
    //     return $this->hasMany(Agent::class);
    // }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function sender_information():HasOne
      {
          return $this->HasOne(SenderInformation::class);
      }

      public function confirm_transaction():HasOne
      {
          return $this->HasOne(ConfirmTransaction::class);
      }

      public function receiver()
      {
          return $this->hasMany(Receiver::class);
      }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
