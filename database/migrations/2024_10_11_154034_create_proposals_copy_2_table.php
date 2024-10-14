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
        Schema::create('proposals_copy_2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi', 50);
            $table->unsignedBigInteger('user_id')->index('proposals_user_id_foreign');
            $table->string('user_request');
            $table->string('user_status');
            $table->string('departement');
            $table->string('ext_phone', 50);
            $table->string('status_barang', 50);
            $table->string('facility');
            $table->string('user_note');
            $table->string('it_analys')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals_copy_2');
    }
};
