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
        Schema::create('infousers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('full_name');
            $table->string('work')->nullable();
            $table->string('storbi');
            $table->string('img_background');
            $table->string('basic_work');
            $table->text('about');
            $table->string('phone_email_one');
            $table->string('degree');
            $table->integer('age');
            $table->string('city');
            $table->string('phone');
            $table->date('birthday');
            $table->string('freelance');
            $table->text('motivation_letter');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('tytar_x')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infousers');
    }
};
