<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('admission_date');
            $table->string('session');
            $table->text('previous-ad-number');
            $table->integer('adm-type');
            $table->integer('class');
            $table->integer('section');
            $table->integer('stream');
            $table->integer('roll_number');
            $table->text('adm-no');
            $table->integer('gender');
            $table->integer('DOB-certificate');
            $table->integer('SLC');
            $table->integer('report-card');
            $table->integer('aadhar-card');
            $table->integer('TC');
            $table->integer('document-verified');
            $table->date('DOB');
            $table->integer('father');
            $table->integer('mother');
            $table->text('tel-1');
            $table->text('tel-2');
            $table->integer('addhar_number');
            $table->text('address');
            $table->integer('convinience-req');
            $table->integer('station');
            $table->integer('other-con');
            $table->integer('cast-category');
            $table->integer('religion');
            $table->text('blood-group');
            $table->integer('annual_income');
            $table->text('path');
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
        Schema::dropIfExists('students');
    }
}
