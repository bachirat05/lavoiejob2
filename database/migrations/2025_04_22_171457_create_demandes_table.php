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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->foreignId('fonction_id')->constrained('fonctions');
            $table->string('nom_demande');
            $table->enum('abonnement', [
                'mensuel permanent',
                '1 fois par semaine',
                '2 fois par semaine',
                '3 fois par semaine'
            ]);
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
             $table->enum('mode_emploi', [
                'couchant(e)',
                'non couchant(e)',
                
            ]);
            $table->text('criteres')->nullable();
            $table->decimal('prix_max', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->enum('sexe_prefere', ['Homme', 'Femme', 'Peu importe'])->default('Peu importe');
            $table->integer('experience_min')->nullable();
            $table->date('date_debut')->nullable();
            $table->text('lieu_travail')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('repos')->nullable();
            $table->string('marital')->nullable();
            $table->text('kids')->nullable();
            $table->text('language')->nullable();
            $table->string('studies_level')->nullable();
            $table->string('studies_speciality')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
