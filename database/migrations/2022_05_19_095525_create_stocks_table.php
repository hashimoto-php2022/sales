<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id' , 8)->unsigned()->index();
            $table->bigInteger('subject_id' , 8)->unsigned()->index();;
            $table->string('status' , 3);
            $table->integer('price' , 4);
            $table->boolean('stock');
            $table->string('remarks' , 200)->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps()

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
