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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('title');
            $table->mediumText('content')->comment('content');
            $table->dateTime('start_date_time')->nullable()->comment('start time');
            $table->dateTime('end_date_time')->nullable()->comment('end time');
            $table->boolean('enabled')->comment('enabled')->default(0);
            $table->integer('order')->comment('order')->default(0);
            $table->boolean('is_show_in_announce_page')->comment('is show in announce page')->default(0);
            $table->boolean('is_popup')->comment('is popup')->default(0);
            $table->boolean('is_important')->comment('is important')->default(0);
            $table->boolean('is_show_scrolling_text')->comment('is show scrolling text')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
