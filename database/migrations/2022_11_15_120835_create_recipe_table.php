<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_name');
            $table->text('description');
            $table->bigInteger('author_id')->nullable();
            $table->string('author_name')->default('admin');
            $table->integer('is_approved')->default(0)->comment('0 if not yet approved | 1 if approved already | 2 if under reviewing | 3 if emailed | 4 if trashed');
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
        Schema::dropIfExists('recipes');
    }
};
