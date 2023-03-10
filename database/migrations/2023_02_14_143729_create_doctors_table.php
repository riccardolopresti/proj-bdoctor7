<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('surname',80);
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('cv')->nullable();
            $table->string('cv_original_name')->nullable();
            $table->string('image')->nullable();
            $table->string('image_original_name')->nullable();
            $table->string('phone',20)->nullable();
            $table->text('health_care')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
