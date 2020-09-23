<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyDrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_draws', function (Blueprint $table) {
            $table->id();
            
            $table->integer('l2_d_draw');
            $table->integer('l2_m_draw');
            $table->integer('l2_md_draw');

            $table->integer('s3_d_draw');
            $table->integer('s3_m_draw');
            $table->integer('s3_md_draw');

            $table->integer('p3_d_draw');
            $table->integer('p3_m_draw');
            $table->integer('p3_md_draw');

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
        Schema::dropIfExists('daily_draws');
    }
}
