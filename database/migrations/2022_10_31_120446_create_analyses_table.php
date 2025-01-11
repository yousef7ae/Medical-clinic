<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('analyse_number')->nullable();
            $table->string('analyse_result')->nullable();
            $table->date('analyse_date')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('analyses');
    }
}
