<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer("failed");
            $table->text('subjects');
            $table->integer("qualified");
            $table->date('dues_paid_upto');
            $table->integer("fee-cons");
            $table->integer("TPD");
            $table->integer("TWD");
            $table->integer("NCC_cadet");
            $table->integer("extra_caricullar");
            $table->integer("conduct");
            $table->integer("DAC");
            $table->integer("DIC");
            $table->text('reasons');
            $table->text("remarks");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_certificates');
    }
}
