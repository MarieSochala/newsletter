<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previews', function (Blueprint $table){
            $table->increments('id');
            $table->text('title');
            $table->text('content');
            $table->text('processed')->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->softDeletes();

        });

        Schema::create('sents', function (Blueprint $table){
            $table->increments('id');
            $table->text('title');
            $table->text('content');
            $table->text('processed');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->softDeletes();
            $table->timestamp('sent_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
