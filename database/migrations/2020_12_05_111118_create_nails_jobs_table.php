<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNailsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nails_jobs', function (Blueprint $table) {
            $table->id();
            $table->double('price')->default(0);
            $table->text('image');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('instagram')->nullable();
            $table->foreignId('category_nail_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('master_point_id')->constrained()->onDelete('CASCADE');
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
        Schema::dropIfExists('nails_jobs');
    }
}
