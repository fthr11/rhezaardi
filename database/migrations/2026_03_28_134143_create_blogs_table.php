<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titleEN');
            $table->string('titleID');
            $table->string('slugEN')->unique();
            $table->string('slugID')->unique();
            $table->text('contentEN');
            $table->text('contentID');
            $table->string('thumbnail');
            $table->json('images')->nullable();
            $table->json('tags');
            $table->string('embed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
