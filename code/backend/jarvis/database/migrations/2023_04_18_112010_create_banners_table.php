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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('name ');
            $table->string('destination_url', 255)->nullable()->comment('destination url');
            $table->string('img_url', 255)->nullable()->comment('image url');
            $table->string('mobile_img_url', 255)->nullable()->comment('image url for module');
            $table->integer('order')->comment('order')->default(0);
            $table->boolean('enabled')->comment('enabled')->default(0);
            $table->dateTime('start_date_time')->nullable()->comment('start time');
            $table->dateTime('end_date_time')->nullable()->comment('end time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
