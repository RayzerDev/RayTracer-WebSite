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
        Schema::create('scenes', function (Blueprint $table) {
            $table->id('idScene');
            $table->string('nomScene');
            $table->string('description');
            $table->string('lienVignetteImage');
            $table->string('lienExecutable');
            $table->dateTime('dateAjout');
            $table->string('descriptionScene');
            $table->string('lienImage');
            $table->integer('equipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenes');
    }
};
