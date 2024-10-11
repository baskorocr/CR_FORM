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
        Schema::create('process_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('approvable_type');
            $table->unsignedBigInteger('approvable_id');
            $table->unsignedBigInteger('process_approval_flow_step_id')->nullable()->index('process_approvals_process_approval_flow_step_id_foreign');
            $table->string('approval_action', 12)->default('Approved');
            $table->text('approver_name')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id')->index('process_approvals_user_id_foreign');
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
        Schema::dropIfExists('process_approvals');
    }
};
