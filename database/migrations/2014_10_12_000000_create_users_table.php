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
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('id_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->bigInteger('mobile_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('email_code')->nullable();
            $table->string('gender')->nullable()->default(0);
            $table->date('birth_date')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('job')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->text('previous_operations')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('status')->default(0)->nullable();
            $table->bigInteger('insurance_id')->nullable();
            $table->bigInteger('doctor_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('api_token')->nullable();
            $table->string('reset_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
