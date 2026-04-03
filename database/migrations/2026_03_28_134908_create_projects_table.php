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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titleEN');
            $table->string('titleID');
            $table->string('slugEN')->unique();
            $table->string('slugID')->unique();
            $table->text('descriptionEN');
            $table->text('descriptionID');
            $table->string('thumbnail');
            $table->json('images')->nullable();
            $table->json('embed')->nullable();
            $table->foreignId('project_category_id')->nullable()->constrained('project_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
