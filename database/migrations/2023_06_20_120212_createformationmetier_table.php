<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateformationmetierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digit_demandeur_enrolement_formations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('guichetemploi_id')->nullable();
            $table->integer('agenceregionale_id')->nullable();
            $table->string('nom_prenoms')->nullable();
            $table->integer('telephone')->nullable();
            $table->integer('email')->nullable();
            $table->date('datenaissance')->nullable();
            $table->integer('villenaissance_id')->nullable();
            $table->integer('paysnaissance_id')->nullable();
            $table->integer('sexe_id')->nullable();
            $table->integer('nationalite_id')->nullable();
            $table->integer('paysresidence_id')->nullable();
            $table->integer('villeresidence_id')->nullable();
            $table->integer('regionresidence_id')->nullable();
            $table->integer('typepieceidentite_id')->nullable();
            $table->integer('numeropiece')->nullable();
            $table->integer('situationmatrimoniale_id')->nullable();
            $table->integer('nombreenfant')->nullable();

            $table->text('diplome_certificat')->nullable();
            $table->text('qualif_prof')->nullable();
            $table->integer('niveauetude_id')->nullable();
            $table->boolean('pratiquesport')->nullable();
            $table->text('disciplines_sportif')->nullable();
            $table->longText('motivation_programmeformation')->nullable();
            $table->text('situationprof_actu')->nullable();
            $table->text('preciser_typeactivite')->nullable();
            $table->text('preciser_typeformation')->nullable();
            $table->text('preciser_dureesansemploi')->nullable();

            $table->string('nom_prenoms_pere')->nullable();
            $table->string('nom_prenoms_mere')->nullable();

            $table->integer('region_miseoeuvre')->nullable();
            $table->integer('localite_miseoeuvre')->nullable();

            $table->integer('formationmetiersports_id')->nullable();

            $table->timestamps();
        });

        Schema::create('digit_parametrage_formation_metier_sports', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('libelle')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('digit_parametrage_formation_metier_sports');
        Schema::dropIfExists('digit_demandeur_enrolement_formations');
    }
}
