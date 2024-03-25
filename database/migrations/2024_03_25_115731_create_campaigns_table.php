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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

            $table->string('name');
            $table->integer('total_players');
            $table->string('session_frequency');
            $table->string('language');
            $table->boolean('searching_for_players')->default(false);
            $table->string('discord_server_tag');
            $table->text('excerpt');
            $table->text('body');
            //$table->string('version');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
