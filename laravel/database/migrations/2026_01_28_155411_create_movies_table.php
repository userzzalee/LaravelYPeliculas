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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('director');
            $table->year('año');
            $table->string('genero');
            $table->integer('duracion');
            $table->text('sinopsis')->nullable();
            $table->text('reparto')->nullable();

            $table->foreignId('user_id')
                ->constrained('users') // El número que se guarde en user_id tiene que existir como id en la tabla users.
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
