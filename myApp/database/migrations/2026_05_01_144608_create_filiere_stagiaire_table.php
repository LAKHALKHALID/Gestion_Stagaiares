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
        Schema::create('filiere_stagiaire', function (Blueprint $table) {
            $table->string('filiere_id');
            $table->foreign('filiere_id')->references('code_f')->on('filieres')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('filiere_id')->constrained('filieres','code_f')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('stagiaire_id')->constrained('stagiaire', 'cef')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['filiere_id', 'stagiaire_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere_stagiaire');
    }
};
