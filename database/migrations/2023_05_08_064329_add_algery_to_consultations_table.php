<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlgeryToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->boolean('allergy')->nullable();
            $table->text('allergy_text')->nullable();

            $table->boolean('medical_history2')->nullable();
            $table->text('medical_history_text2')->nullable();
            $table->text('medical_history_drug2')->nullable();
            $table->boolean('medical_history3')->nullable();
            $table->text('medical_history_text3')->nullable();
            $table->text('medical_history_drug3')->nullable();

            $table->boolean('surgery2')->nullable();
            $table->text('surgery2_text')->nullable();
            $table->text('surgery2_date')->nullable();
            $table->boolean('surgery3')->nullable();
            $table->text('surgery3_text')->nullable();
            $table->text('surgery3_date')->nullable();
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
            $table->dropColumn('allergy');
            $table->dropColumn('allergy_text');

            $table->dropColumn('medical_history2');
            $table->dropColumn('medical_history_text2');
            $table->dropColumn('medical_history_drug2');
            $table->dropColumn('medical_history3');
            $table->dropColumn('medical_history_text3');
            $table->dropColumn('medical_history_drug3');

            $table->dropColumn('surgery2');
            $table->dropColumn('surgery2_text');
            $table->dropColumn('surgery2_date');
            $table->dropColumn('surgery3');
            $table->dropColumn('surgery3_text');
            $table->dropColumn('surgery3_date');
        });
    }
}
