<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('revenue_type')->nullable();
            $table->bigInteger('category_id')->nullable()->index();
            $table->bigInteger('patient_id')->nullable()->index();
            $table->date('date')->nullable();
            $table->tinyInteger('payment_method')->nullable();
            $table->bigInteger('check_number')->nullable();
            $table->date('check_date')->nullable();
            $table->longText('notes')->nullable();
            $table->float('amount')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
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
        Schema::dropIfExists('revenues');
    }
}
