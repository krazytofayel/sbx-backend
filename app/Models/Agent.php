<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [

        'full_name',
        'email',
        'phone',
        'alt_phone',
        'thumbnail',
        'dob',
        'nid',
        'city',
        'state',
        'country',
        'post_code',
        'back_ac_name',
        'back_ac_no',
    ];

    // An Agent can have multiple Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // An Agent can have multiple ConfirmTransactions
    public function confirmTransactions()
    {
        return $this->hasMany(ConfirmTransaction::class);
    }

    /**
     * Get the user that owns the phone.
     */

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

}
