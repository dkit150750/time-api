<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changes', function (Blueprint $table) {
            $table->id();
            // дисциплины
            $table->unsignedBigInteger('disciplineEven')->default(1);
            $table->foreign('disciplineEven')->references('id')->on('disciplines');
            $table->unsignedBigInteger('disciplineOdd')->default(1);
            $table->foreign('disciplineOdd')->references('id')->on('disciplines');

            // нечетные кабинты
            $table->unsignedBigInteger('firstOddCabinet')->default(1);
            $table->foreign('firstOddCabinet')->references('id')->on('cabinets');
            $table->unsignedBigInteger('secondOddCabinet')->default(1);
            $table->foreign('secondOddCabinet')->references('id')->on('cabinets');
            // четные кабинты
            $table->unsignedBigInteger('firstEvenCabinet')->default(1);
            $table->foreign('firstEvenCabinet')->references('id')->on('cabinets');
            $table->unsignedBigInteger('secondEvenCabinet')->default(1);
            $table->foreign('secondEvenCabinet')->references('id')->on('cabinets');

            // нечетные преподаватели
            $table->unsignedBigInteger('firstEvenTeacher')->default(1);
            $table->foreign('firstEvenTeacher')->references('id')->on('teachers');
            $table->unsignedBigInteger('secondEvenTeacher')->default(1);
            $table->foreign('secondEvenTeacher')->references('id')->on('teachers');
            // четные преподаватели
            $table->unsignedBigInteger('firstOddTeacher')->default(1);
            $table->foreign('firstOddTeacher')->references('id')->on('teachers');
            $table->unsignedBigInteger('secondOddTeacher')->default(1);
            $table->foreign('secondOddTeacher')->references('id')->on('teachers');

            $table->foreignId('group_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('changes');
    }
}
