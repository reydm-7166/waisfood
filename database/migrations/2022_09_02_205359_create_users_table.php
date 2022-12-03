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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->integer('age')->length(10);
            $table->string('email_address', 145);
            $table->string('password', 255);
            $table->bigInteger('service_id')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->tinyInteger('role_as')->default('0')->comment('0 is normal user 1 is for admin');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'UserSeeder'
        ]);
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
};
