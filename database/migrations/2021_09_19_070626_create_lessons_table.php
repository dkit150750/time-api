<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained()->onDelete('cascade');
            // дисциплины
            $table->unsignedBigInteger('disciplineEven_id')->default(1);
            $table->foreign('disciplineEven_id')->references('id')->on('disciplines');
            $table->unsignedBigInteger('disciplineOdd_id')->default(1);
            $table->foreign('disciplineOdd_id')->references('id')->on('disciplines');

            // нечетные кабинеты
            $table->unsignedBigInteger('firstOddCabinet_id')->default(1);
            $table->foreign('firstOddCabinet_id')->references('id')->on('cabinets');
            $table->unsignedBigInteger('secondOddCabinet_id')->default(1);
            $table->foreign('secondOddCabinet_id')->references('id')->on('cabinets');
            // четные кабинеты
            $table->unsignedBigInteger('firstEvenCabinet_id')->default(1);
            $table->foreign('firstEvenCabinet_id')->references('id')->on('cabinets');
            $table->unsignedBigInteger('secondEvenCabinet_id')->default(1);
            $table->foreign('secondEvenCabinet_id')->references('id')->on('cabinets');

            // нечетные преподаватели
            $table->unsignedBigInteger('firstEvenTeacher_id')->default(1);
            $table->foreign('firstEvenTeacher_id')->references('id')->on('teachers');
            $table->unsignedBigInteger('secondEvenTeacher_id')->default(1);
            $table->foreign('secondEvenTeacher_id')->references('id')->on('teachers');
            // четные преподаватели
            $table->unsignedBigInteger('firstOddTeacher_id')->default(1);
            $table->foreign('firstOddTeacher_id')->references('id')->on('teachers');
            $table->unsignedBigInteger('secondOddTeacher_id')->default(1);
            $table->foreign('secondOddTeacher_id')->references('id')->on('teachers');

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
        Schema::dropIfExists('lessons');
    }
}
