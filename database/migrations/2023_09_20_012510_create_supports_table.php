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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('requester_id')->unsigned();
            $table->foreIgn('requester_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('assistant_id')->unsigned()->nullable();
            $table->foreIgn('assistant_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('subject_id')->unsigned();
            $table->foreIgn('subject_id')->references('id')->on('subject')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description');
            $table->tinyInteger('status')->default(1);
            $table->string('code');
            $table->string('file')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->string('review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
