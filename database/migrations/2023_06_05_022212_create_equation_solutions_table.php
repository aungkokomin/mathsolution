<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquationSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('equation_solutions', function (Blueprint $table) {
            $table->id();
            $table->integer('hier');
            $table->integer('gibt');
            $table->integer('es');
            $table->integer('neues');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equation_solutions');
    }
}
