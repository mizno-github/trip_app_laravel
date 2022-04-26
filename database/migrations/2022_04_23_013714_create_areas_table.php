<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('areas', function (Blueprint $table) {
        //     $table->id();
        //     $table->char('prefectures', 5);
        //     $table->char('city', 15);
        //     $table->double('lat', 9, 6);
        //     $table->double('lon', 9, 6);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('areas');
    }
};
