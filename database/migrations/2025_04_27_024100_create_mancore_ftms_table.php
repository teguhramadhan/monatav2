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
        Schema::create('mancore_ftms', function (Blueprint $table) {
            $table->id();
            $table->string('sto');
            $table->string('gpon_slot_port');
            $table->string('gpon_ip');
            $table->string('eakses');
            $table->string('oakses');
            $table->string('odc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mancore_ftms');
    }
};
