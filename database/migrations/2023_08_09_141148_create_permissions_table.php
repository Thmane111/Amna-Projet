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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission');
            $table->foreignId('groupe_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->foreignId('module_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->integer('etat');
            $table->integer('deletable');
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
        Schema::dropIfExists('permissions');
    }
};
