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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('seminar_id')->constrained('seminars');
            $table->foreignId('project_id')->constrained('projects');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('matric')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique;
            $table->string('supervisor');
            $table->string('session');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
