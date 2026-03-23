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
        Schema::create('package_vulnerabilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('package_id')->constrained()->cascadeOnDelete();
            $table->string('cve_id')->nullable();
            $table->string('osv_id')->nullable(); // id do banco OSV.dev
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);
            $table->string('affected_versions');
            $table->text('summary')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->unique(['package_id', 'osv_id']); // nao duplica a mesma vul no mesmo pacote
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_vulnerabilities');
    }
};
