<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable();
            $table->string('disease')->nullable();
            $table->string('amount')->nullable();
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->bigInteger('patient_id')->nullable()->index();
            $table->bigInteger('doctor_id')->nullable()->index();
            $table->bigInteger('category_id')->nullable()->index();
            $table->bigInteger('type')->default(0)->nullable();
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
        Schema::dropIfExists('consultations');
    }
}
