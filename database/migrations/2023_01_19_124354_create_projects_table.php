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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('student_id')->constrained('students');
            $table->string('project_topic')->nullable();
            $table->longText('project_desc')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_members')->nullable();
            $table->string('project_file_name')->nullable();
            $table->string('project_file_path')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
