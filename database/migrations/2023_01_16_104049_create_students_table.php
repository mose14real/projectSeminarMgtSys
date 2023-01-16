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
            $table->foreignId('seminar_id')->nullable()->constrained('seminars');
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('matric')->unique();
            $table->string('phone')->unique;
            $table->string('supervisor');
            $table->string('session');
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
        Schema::dropIfExists('students');
    }
};
