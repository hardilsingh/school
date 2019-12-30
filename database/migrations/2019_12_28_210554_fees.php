<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("student_id");
            $table->integer("jmf")->default(0);
            $table->integer("jcf")->default(0);
            $table->integer("jtf")->default(0);
            $table->integer("jsf")->default(0);
            $table->integer("fmf")->default(0);
            $table->integer("fcf")->default(0);
            $table->integer("ftf")->default(0);
            $table->integer("fsf")->default(0);
            $table->integer("mmf")->default(0);
            $table->integer("mcf")->default(0);
            $table->integer("mtf")->default(0);
            $table->integer("msf")->default(0);
            $table->integer("amf")->default(0);
            $table->integer("acf")->default(0);
            $table->integer("atf")->default(0);
            $table->integer("asf")->default(0);
            $table->integer("maymf")->default(0);
            $table->integer("maycf")->default(0);
            $table->integer("maytf")->default(0);
            $table->integer("maysf")->default(0);
            $table->integer("junemf")->default(0);
            $table->integer("junecf")->default(0);
            $table->integer("junetf")->default(0);
            $table->integer("junesf")->default(0);
            $table->integer("julymf")->default(0);
            $table->integer("julycf")->default(0);
            $table->integer("julytf")->default(0);
            $table->integer("julysf")->default(0);
            $table->integer("julyid_card_fee")->default(0);
            $table->integer("augmf")->default(0);
            $table->integer("augcf")->default(0);
            $table->integer("augtf")->default(0);
            $table->integer("augsf")->default(0);
            $table->integer("septmf")->default(0);
            $table->integer("septcf")->default(0);
            $table->integer("septtf")->default(0);
            $table->integer("septsf")->default(0);
            $table->integer("octmf")->default(0);
            $table->integer("octcf")->default(0);
            $table->integer("octtf")->default(0);
            $table->integer("octsf")->default(0);
            $table->integer("octexamination_fee")->default(0);
            $table->integer("novmf")->default(0);
            $table->integer("novcf")->default(0);
            $table->integer("novtf")->default(0);
            $table->integer("novsf")->default(0);
            $table->integer("decmf")->default(0);
            $table->integer("deccf")->default(0);
            $table->integer("dectf")->default(0);
            $table->integer("decsf")->default(0);
            $table->integer("prospectus")->default(0);
            $table->integer("annual_charges")->default(0);
            $table->integer("admission_fee")->default(0);
            $table->integer("outstanding")->default(0);
            $table->integer("overpaid")->default(0);
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
        //
    }
}
