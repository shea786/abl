<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username')->unique();
                $table->string('first_name', 30)->nullable();
                $table->string('last_name', 30)->nullable();
                $table->string('email')->unique();
                $table->string('password', 60);
                $table->rememberToken();
                $table->smallInteger('status')->default(0);
                $table->dateTime('moderated_at')->nullable();
                $table->integer('moderated_by')->nullable()->unsigned();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
