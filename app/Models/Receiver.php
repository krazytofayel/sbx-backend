<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receiver extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'alt_phone',
        // 'thumbnail',
        // 'dob',
        // 'nid',
        'city',
        'state',
        'country',
        'post_code',
        'back_ac_name',
        'back_ac_no',
    ];

    // Define the relationship with transactions
    //  public function sender_information():HasOne
    //  {
    //      return $this->HasOne(SenderInformation::class);
    //  }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class );
    }

    public function confirmTransactions()
    {
        return $this->HasMany(ConfirmTransaction::class);
    }
}
