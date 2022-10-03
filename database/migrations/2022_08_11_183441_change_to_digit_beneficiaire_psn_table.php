<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeToDigitBeneficiairePsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digit_beneficiaire_psn', function (Blueprint $table) {
            $table->string('nomprenoms')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digit_beneficiaire_psn', function (Blueprint $table) {
            //
        });
    }
}
