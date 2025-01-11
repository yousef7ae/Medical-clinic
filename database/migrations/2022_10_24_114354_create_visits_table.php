<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('blood_pressure')->nullable();
            $table->string('temperature')->nullable();
            $table->string('sugar')->nullable();
            $table->string('number_sessions')->nullable();
            $table->string('waiting_list')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->longText('notes')->nullable();
            $table->date('detection_date')->nullable();
            $table->bigInteger('visit_type_id')->nullable()->index();
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
        Schema::dropIfExists('visits');
    }
}
