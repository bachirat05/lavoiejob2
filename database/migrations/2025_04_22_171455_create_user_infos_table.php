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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('reference')->nullable();
            $table->string('avatar_url')->nullable();
            
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->string('logement')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();

            $table->string('cin')->nullable();
            $table->text('cin_address')->nullable();
            $table->timestamp('cin_validity')->nullable();

            $table->string('birth_city')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('nationality')->nullable();
            
            $table->string('marital')->nullable();
            $table->text('kids')->nullable(); // array {kids_number:1, kids:{kid_age:5, kid_sexe:fille, kid_garde:Maison}}
            $table->string('religion')->nullable();
            $table->text('language')->nullable();
            $table->string('animal')->nullable();
            $table->text('emergency_contact')->nullable(); // array

            $table->text('sickness')->nullable();

            $table->string('studies_level')->nullable();
            $table->string('studies_speciality')->nullable();
            $table->text('mobility')->nullable();
            $table->decimal('experience')->nullable();

            $table->decimal('price_min')->nullable();
            $table->decimal('price_max')->nullable();
            $table->string('echeance')->nullable();
            $table->string('repos')->nullable();

            $table->string('source')->nullable();
            $table->string('source_complement')->nullable();

            $table->decimal('rate')->nullable();
            $table->longText('presentation')->nullable();
            $table->longText('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
