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
        Schema::create('scan_dependencies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('scan_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('package_id')->constrained()->cascadeOnDelete();
            $table->string('declared_version');
            $table->string('resolved_version')->nullable();
            $table->boolean('is_used_in_code')->nullable();
            $table->integer('import_count')->default(0);
            $table->enum('triage_status', ['act_now', 'monitor', 'ignore', 'ghost'])->nullable();
            $table->text('triage_reason');
            $table->integer('impact_score')->default(0);
            $table->boolean('has_breaking_update')->default(false);
            $table->boolean('has_cve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_dependencies');
    }
};
