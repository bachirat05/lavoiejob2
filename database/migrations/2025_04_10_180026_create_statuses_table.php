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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ex : "prospect", "placé"
            $table->string('label'); // ex : "Prospect", "Placé"
            $table->enum('type', ['client', 'candidat', 'global'])->default('global');
            $table->string('color')->nullable()->default('#7367f0'); // optionnel pour UI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
