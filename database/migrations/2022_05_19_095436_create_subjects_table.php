<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_code', 13)->unique();
            $table->string('title', 50);
            $table->bigInteger('class_id', 2)->unsigned()->index();
            $table->string('author', 50);
            $table->timestamps();

            $table->foreign('class_id')->references('id')
            ->on('classifications')->onDelete('cascade');

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
