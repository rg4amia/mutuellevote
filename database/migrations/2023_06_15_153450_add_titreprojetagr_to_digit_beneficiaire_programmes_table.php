<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitreprojetagrToDigitBeneficiaireProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digit_beneficiaire_programmes', function (Blueprint $table) {
            $table->string('titre_projet')->nullable();
            $table->string('sexe')->nullable();
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
            $table->dropColumn('titre_projet');
        });
    }
}
