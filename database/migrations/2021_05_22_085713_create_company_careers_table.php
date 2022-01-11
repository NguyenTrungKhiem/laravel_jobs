<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_careers', function (Blueprint $table) {
            $table->id();
            $table->integer('cc_company_id')->default(0);
            $table->integer('cc_careers_id')->default(0);
            $table->unique(['cc_company_id','cc_careers_id']);
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
        Schema::dropIfExists('company_careers');
    }
}
