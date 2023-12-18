<?php

use App\Traits\ImageStoreInStorage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use ImageStoreInStorage;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->flushImageScene();
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('nom');
            $table->integer('equipe');
            $table->string('description');
            $table->string('format')->nullable();
            $table->string('vignetteImage')->default("scene/images/noimg.png");
            $table->string('executable')->nullable();
            $table->string('image')->default("scene/images/noimg.png");
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
