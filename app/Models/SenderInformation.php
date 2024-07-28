<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SenderInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reference_id',
        'name',
        'thumbnail',
        'phone',
        'alt_phone',
        'dob',
        'nid',
        'city',
        'state',
        'country',
        'post_code',
    ];

    /**
     * Get the user that owns the phone.
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function transaction():HasMany
    {
        return $this->HasMany(Transaction::class);
    }
    public function confirmTransactions()
    {
        return $this->hasOne(ConfirmTransaction::class);
    }

     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->reference_id = uniqid();
        });
    }



}
