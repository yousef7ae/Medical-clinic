<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsulationHistoryToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {

            $table->string('job')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->text('previous_operations')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('insurance_id')->nullable();
            $table->boolean('medical_history')->nullable();
            $table->text('medical_history_text')->nullable();
            $table->text('medical_history_drug')->nullable();
            $table->longText('other_diagnosis')->nullable();
            $table->boolean('surgery')->nullable();
            $table->text('surgery_text')->nullable();
            $table->date('surgery_date')->nullable();
            $table->longText('other_surgery')->nullable();
            $table->longText('other_medication')->nullable();
            $table->longText('lab')->nullable();
            $table->longText('international_index')->nullable();
            $table->longText('examination')->nullable();
            $table->longText('impression_recommendation')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            //
        });
    }
}
