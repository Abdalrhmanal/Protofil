<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('eskills', function (Blueprint $table) {
            $table->id();
            $table->string('name_skill')->nullable();
            $table->integer('ratio');
            $table->unsignedBigInteger('id_user'); // الحقل لربطه بجدول Users
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskills');
    }
};
