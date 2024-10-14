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
        Schema::create('process_approval_flow_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('process_approval_flow_id')->index('process_approval_flow_steps_process_approval_flow_id_foreign');
            $table->unsignedBigInteger('role_id')->index();
            $table->json('permissions')->nullable();
            $table->integer('order')->nullable()->index();
            $table->enum('action', ['APPROVE', 'VERIFY', 'CHECK'])->default('APPROVE');
            $table->tinyInteger('active')->default(1);
            $table->string('tenant_id', 38)->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_approval_flow_steps');
    }
};
