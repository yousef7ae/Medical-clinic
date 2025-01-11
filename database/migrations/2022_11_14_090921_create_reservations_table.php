<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('booking_list')->nullable();
            $table->date('date')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->longText('notes')->nullable();
            $table->bigInteger('reservation_type_id')->nullable()->index();
            $table->bigInteger('user_id')->nullable()->index();
            $table->bigInteger('patient_id')->nullable()->index();
            $table->bigInteger('doctor_id')->nullable()->index();
            $table->bigInteger('category_id')->nullable()->index();
            $table->bigInteger('status')->default(0)->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
