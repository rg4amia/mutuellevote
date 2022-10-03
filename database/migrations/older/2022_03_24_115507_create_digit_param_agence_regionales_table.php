<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitParamAgenceRegionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digit_param_agence_regionales', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->string('code')->nullable();

            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')
                ->references('id')
                ->on('digit_param_departements');

            $table->unsignedBigInteger('sousprefecture_commune_id');
            $table->foreign('sousprefecture_commune_id')
                ->references('id')
                ->on('digit_param_sous_prefecture_communes');

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')
                ->references('id')
                ->on('digit_param_regions');

            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')
                ->references('id')
                ->on('digit_param_districts');

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
        Schema::dropIfExists('digit_param_agence_regionales');
    }
}
