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
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(null)->constrained()->onDelete('cascade');


            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->required;
            $table->string('alt_phone')->nullable();
            // $table->string('thumbnail')->nullable();
            // $table->string('dob')->required;
            // $table->string('nid')->required;
            $table->string('city')->required;
            $table->string('state')->required;
            $table->string('country')->required;
            $table->string('post_code')->required;
            $table->string('back_ac_name')->required;
            $table->string('back_ac_no')->required;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receivers');
    }
};
