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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->decimal('rate')->nullable();

            $table->string('ice')->nullable();
            $table->string('rc')->nullable();
            $table->string('patente')->nullable();

            $table->string('industry')->nullable();
            $table->string('activity')->nullable();
            $table->string('language')->nullable();
            $table->timestamp('founded_year')->nullable();

            $table->string('avatar_url')->nullable();

            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();

            
            $table->string('type_local')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->string('source')->nullable();
            $table->string('source_complement')->nullable();

            $table->string('representant')->nullable();
            $table->string('representant_phone')->nullable();
            $table->string('representant_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
