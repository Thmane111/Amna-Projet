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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->String('Numero_Candidat')->unique();;
            $table->String('CIN');
            $table->String('Nom');
            $table->String('Prenom');
            $table->String('Date_Naissance');
            $table->String('Lieu_Naissance');
            $table->foreignId('ecole_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->foreignId('serie_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->foreignId('niveau_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            
         
            $table->integer('etat');
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
        Schema::dropIfExists('eleves');
    }
};
