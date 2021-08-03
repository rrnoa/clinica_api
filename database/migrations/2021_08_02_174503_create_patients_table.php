<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('bi',14)->unique();
            $table->string('name');
            $table->boolean('enable')->default(1);
            $table->char('sex');
            $table->string('telf');
            $table->binary('photo')->nullable();
            $table->string('email')->nullable();
            $table->text('morada')->nullable();
            $table->string('municipio')->nullable();
            $table->string('provincia')->nullable();
            $table->date('born_at');
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
        Schema::dropIfExists('patients');
    }
}
