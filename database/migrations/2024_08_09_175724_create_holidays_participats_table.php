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
        Schema::disableForeignKeyConstraints();

        Schema::create('holidays_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('id_participant');
            $table->unsignedBigInteger('id_holiday');
            $table->foreign('id_participant')->references('id')->on('participants');
            $table->foreign('id_holiday')->references('id')->on('holiday');
            $table->primary(['id_participant', 'id_holiday']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays_participats');
    }
};
