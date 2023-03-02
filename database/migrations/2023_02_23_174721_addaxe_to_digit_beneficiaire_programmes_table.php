<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddaxeToDigitBeneficiaireProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digit_beneficiaire_programmes', function (Blueprint $table) {
            $table->string('axe',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digit_beneficiaire_programmes', function (Blueprint $table) {
            //
        });
    }
}
