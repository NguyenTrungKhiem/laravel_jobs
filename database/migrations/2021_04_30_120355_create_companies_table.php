<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->nullable();
            $table->string('c_slug')->nullable()->unique();
            $table->string('c_hash_slug')->nullable()->index();
            $table->string('c_address')->nullable();
            $table->string('c_phone')->nullable();
            $table->integer('c_employer_id')->index()->default(0);
            $table->string('c_website')->nullable();
            $table->string('c_logo')->nullable();
            $table->string('c_email')->nullable();
            $table->tinyInteger('c_scale')->default(0);
            $table->tinyInteger('c_working_time')->default(0);
            $table->tinyInteger('c_status')->default(1);
            $table->text('c_about')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
