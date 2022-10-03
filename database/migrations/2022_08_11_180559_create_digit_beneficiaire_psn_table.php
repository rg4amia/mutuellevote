<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitBeneficiairePsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digit_beneficiaire_psn', function (Blueprint $table) {
            $table->id();
            $table->string('region')->nullable();
            $table->string('departement')->nullable();
            $table->string('sousprefect_commune')->nullable();
            $table->string('quartier_village')->nullable();
            $table->string('nomprenoms')->nullable();
            $table->string('datenaissance')->nullable();
            $table->string('secteuractivite')->nullable();
            $table->string('sexe')->nullable();
            $table->string('programme')->nullable();
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
        Schema::dropIfExists('digit_beneficiaire_psn');
    }
}
