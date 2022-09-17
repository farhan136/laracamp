<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();
            $table->integer('id_camps')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('camp_benefits');
    }
};
