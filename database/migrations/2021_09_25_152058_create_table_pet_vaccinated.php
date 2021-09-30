<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePetVaccinated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pet_vaccinated', function (Blueprint $table) {
            $table->integer('vcntdPetID')->primary();
            $table->string('vcntdPetName');
            $table->mediumText('vcntdPetImage');
            $table->integer('vcntdPetAge');
            $table->string('vcntdPetStatus');
            $table->string('vcntdVacType');
            $table->date('vcntdVacDate')->default(now());
            $table->string('vcntdVacStatus')->default('VC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pet_vaccinated');
    }
}
