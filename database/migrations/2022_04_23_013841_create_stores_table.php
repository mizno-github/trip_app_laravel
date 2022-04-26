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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('message', 10);
            $table->string('detail_title', 15);
            $table->string('name', 25);
            $table->unsignedBigInteger('area_id'); // 外部キー制約をつける
            $table->string('other_address', 120)->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('eigyo_time', 120);
            $table->string('access', 120);
            $table->text('detail_text');
            $table->string('main_img');
            $table->string('sub_img');
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
        Schema::dropIfExists('stores');
    }
};
