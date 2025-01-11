<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name_drug')->nullable();
            $table->string('number_drug')->nullable();
            $table->string('medicine_dose')->nullable();
            $table->string('medicine_unit')->nullable();
            $table->tinyInteger('number')->nullable();
            $table->longText('notes')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}
