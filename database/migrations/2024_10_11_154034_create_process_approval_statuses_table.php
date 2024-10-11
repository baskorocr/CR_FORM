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
        Schema::create('process_approval_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('approvable_type');
            $table->unsignedBigInteger('approvable_id');
            $table->json('steps')->nullable();
            $table->string('status', 10)->default('Created');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('tenant_id', 38)->nullable()->index();
            $table->timestamps();

            $table->index(['approvable_type', 'approvable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_approval_statuses');
    }
};
