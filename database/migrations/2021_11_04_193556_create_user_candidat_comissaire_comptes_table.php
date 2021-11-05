<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCandidatComissaireComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_candidat_comissaire_comptes', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('candidatcomissaireId')->nullable();
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
        Schema::dropIfExists('user_candidat_comissaire_comptes');
    }
}
