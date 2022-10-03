<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitRapportactiviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digit_rapportactivite', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('decription');
            $table->date('date_creation');
            $table->unsignedBigInteger('rapportactivite_id')->nullable();
            $table->boolean('checked');
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
        Schema::dropIfExists('digit_rapportactivite');
    }
}
