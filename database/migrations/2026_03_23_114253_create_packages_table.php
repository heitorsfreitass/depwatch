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
        Schema::create('packages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum('ecosystem', ['npm', 'pypi', 'composer']);
            $table->string('latest_version')->nullable();
            $table->integer('health_score')->nullable();
            $table->boolean('is_deprecated')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->timestamp('last_fetched_at')->nullable();
            $table->timestamps();

            $table->unique(['name', 'ecosystem']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
