<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()->constrained()->cascadeOnDelete();
            $table->foreignId('receiver_id')
                ->index()->constrained()->cascadeOnDelete();
            //$table->foreignId('sender_information_id')->index()->constrained()->cascadeOnDelete();
            $table->double('amount_bd');
            $table->double('amount_au');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
