<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        //'sender_information_id',
        //'status',
        'receiver_id',
        'amount_bd',
        'amount_au',
    ];

    // A Transaction can have multiple ConfirmTransactions
    public function confirmTransactions():HasOne
    {
        return $this->hasOne(ConfirmTransaction::class);
    }

    /**
     * Get the user that owns the phone.
     */

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class );
    // }

    // public function receiver(): BelongsTo
    // {
    //     return $this->belongsTo(Receiver::class);
    // }
    // public function senderInformation(): BelongsTo
    // {
    //     return $this->belongsTo(SenderInformation::class);
    // }





    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function senderInformation()
    {
        return $this->belongsTo(SenderInformation::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }

}
