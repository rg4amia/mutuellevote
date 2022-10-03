<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuichetemploiToDigitParametrageCommuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('digit_parametrage_commune', function (Blueprint $table) {
            $table->unsignedBigInteger('guichetemploi_id')->nullable()->after('divisionregionaleaej_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('digit_parametrage_commune', function (Blueprint $table) {
            //
        });
    }
}
