<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_time_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->boolean('confirmation_master')->default(0);
            $table->boolean('confirmation_customer')->default(0);
            $table->tinyInteger('stars')->nullable();
            $table->text('feedback')->nullable();
            $table->string('image')->nullable();
            $table->boolean('logical_delet')->default(0);
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
        Schema::dropIfExists('recordings');
    }
}
