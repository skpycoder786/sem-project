<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('attendance', function (Blueprint $table) {
            $table->foreignId('teacher_id')->constrained('teacher')->cascadeOnDelete()->after('date');
        });
        Schema::table('teacher_subject', function (Blueprint $table) {
            $table->foreignId('teacher_id')->constrained('teacher')->cascadeOnDelete()->after('id');
        });
        Schema::table('student_subject', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('student')->cascadeOnDelete()->after('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('attendance', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });
        Schema::table('teacher-subject', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });
        Schema::table('student_subject', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
    }
}
