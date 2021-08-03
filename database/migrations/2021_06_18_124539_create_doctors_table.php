<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('bi',14)->unique();
            $table->string('name');
            $table->boolean('enable')->default(1);
            $table->char('sex');
            $table->string('telf');
            $table->binary('photo')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('id_specialty')->unsigned();
            $table->text('morada')->nullable();
            $table->string('municipio')->nullable();
            $table->string('provincia')->nullable();
            $table->date('born_at')->nullable();
            $table->timestamps();
            $table->foreign('id_specialty')->references('id')->on('specialties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
