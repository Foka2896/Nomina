<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalxvehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalxvehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('personal_Id');
            $table->string('transportes_Id');
            $table->date('fecha_diaria');
            $table->string('cd');
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
        Schema::dropIfExists('personalxvehiculos');
    }
}
