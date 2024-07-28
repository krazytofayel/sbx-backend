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
        Schema::create('sender_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()->constrained()->cascadeOnDelete();
            $table->string('reference_id')->uniqid;


            $table->string('name');
            $table->string('thumbnail')-> nullable();
            $table->string('phone')->required;
            $table->string('alt_phone')->nullable();
            $table->string('dob')->required;
            $table->string('nid')->required;
            $table->string('city')->required;
            $table->string('state')->required;
            $table->string('country')->required;
            $table->string('post_code')->required;




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sender_information');
    }
};
