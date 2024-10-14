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
        Schema::table('process_approval_flow_steps', function (Blueprint $table) {
            $table->foreign(['process_approval_flow_id'])->references(['id'])->on('process_approval_flows')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('process_approval_flow_steps', function (Blueprint $table) {
            $table->dropForeign('process_approval_flow_steps_process_approval_flow_id_foreign');
        });
    }
};
