<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->integer('operation_id')->nullable();
            $table->integer('citizen_id')->nullable();
            $table->string('price')->nullable();
            $table->enum('payment_type', ['PAID', 'NO_PAID']);
            $table->enum('operation_type', ['WITHDRAW', 'DEPOSIT'])->nullable();
            $table->enum('status', ['ACCEPTABLE', 'REJECTED', 'REVISION'])->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->userstamps();
            $table->softUserstamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
