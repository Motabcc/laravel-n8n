<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Chave primária (auto-incremento)
            $table->string('nome'); // Varchar
            $table->text('descricao')->nullable(); // Texto longo, permite nulo
            $table->decimal('preco', 8, 2); // Decimal com 2 casas
            $table->integer('quantidade')->default(0); // Inteiro com valor padrão
            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};