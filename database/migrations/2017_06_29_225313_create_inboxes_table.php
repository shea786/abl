<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('msg_to');// friends id
            $table->integer('msg_from'); // your id
            $table->text("message");
            $table->integer('status'); // 0 = sent 1 = read
            $table->dateTime('read_at');
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
        Schema::dropIfExists('inboxes');
    }
}
