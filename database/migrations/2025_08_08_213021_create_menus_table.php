<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nome que aparece no menu
            $table->unsignedBigInteger('page_id'); // Página vinculada
            $table->enum('position', ['principal', 'secundario', 'rodape']); // Local de exibição
            $table->integer('sort_order')->default(0); // Ordem
            $table->timestamps();

            // Chave estrangeira para tabela de páginas
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
