<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_todo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teacher')->cascadeOnDelete();
            $table->text('task');
            $table->integer('status')->comment('1. done 2. pending');
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
        Schema::dropIfExists('teacher_todo');
    }
}
