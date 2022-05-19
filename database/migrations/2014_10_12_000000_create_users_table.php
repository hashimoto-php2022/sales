<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password',8);
            $table->string('name',50);
            $table->string('address',200);
            $table->string('tel_number',13);
            $table->string('e_mail',50);
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birthday');
            $table->date('deleted_at')->nullable();
            $table->boolean('administrator');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
