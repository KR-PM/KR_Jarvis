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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('account', 16)->comment('account');
            $table->string('password')->comment('password');
            $table->string('name')->comment('name');
            $table->integer('age')->comment('name');
            $table->integer('job')->comment('job');
            $table->string('email')->comment('email');
            $table->string('phone')->comment('phone');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
