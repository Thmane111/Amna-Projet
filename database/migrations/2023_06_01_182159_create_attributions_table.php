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
        Schema::create('attributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->foreignId('groupe_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->integer('etat');
            $table->integer('deletable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributions');
    }
};
