<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfCooperationTwoDerivativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_cooperation_two_derivative', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('type_of_cooperation_id');
            $table->tinyInteger('type_of_cooperation_one_derivative_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('name');
            $table->softDeletes();
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
        Schema::dropIfExists('type_of_cooperation_two_derivative');
    }
}
