<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaireProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaire_programmes', function (Blueprint $table) {
            $table->id();
            $table->string('region',75)->nullable();
            $table->string('sousprefect_commune',100)->nullable();
            $table->string('programme',100)->nullable();
            $table->string('numaej',100)->nullable();
            $table->string('nomprenoms',100)->nullable();
            $table->date('datenaissance')->nullable();
            $table->string('annee')->nullable();
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
        Schema::dropIfExists('beneficiaire_programmes');
    }
}
