<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('отчеты', function (Blueprint $table) {
            $table->id();
            $table->string('number');           
            $table->text('description');        
            $table->timestamps();               
            $table->softDeletes();              
        });
    }

    public function down()
    {
        Schema::dropIfExists('отчеты');
    }
};