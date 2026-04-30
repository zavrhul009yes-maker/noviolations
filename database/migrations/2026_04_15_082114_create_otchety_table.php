<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('number');           // номер автомобиля
            $table->text('description');        // описание нарушения
            $table->timestamps();               // created_at, updated_at
            $table->softDeletes();              // deleted_at для мягкого удаления
        });
    }

    public function down()
    {
        Schema::dropIfExists('отчеты');
    }
};