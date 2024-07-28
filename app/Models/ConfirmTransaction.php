<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_id', 'agent_id'];



        // A ConfirmTransaction belongs to a Transaction
        public function transaction()
        {
            return $this->belongsTo(Transaction::class);
        }

        // A ConfirmTransaction belongs to an Agent
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
            return $this->belongsTo(User::class);
        }
}
