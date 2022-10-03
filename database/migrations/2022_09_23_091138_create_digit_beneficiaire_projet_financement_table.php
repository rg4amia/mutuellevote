<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitBeneficiaireProjetFinancementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digit_beneficiaire_projet_financement', function (Blueprint $table) {
            $table->id();
            $table->string('region')->nullable();
            $table->string('sousprefect_commune')->nullable();
            $table->string('programme')->nullable();
            $table->string('numeroaej')->nullable();
            $table->string('promoteur')->nullable();
            $table->string('datecertification')->nullable();
            $table->string('anneecertification')->nullable();
            $table->string('datemiseenplacepret')->nullable();
            $table->string('anneemiseenplace')->nullable();
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
        Schema::dropIfExists('digit_beneficiaire_projet_financement');
    }
}
