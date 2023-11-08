<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->increments('PrerequisiteID');
            $table->integer('CourseID')->unsigned();
            $table->integer('PrerequisiteCourseID')->unsigned();
            $table->string('PrerequisiteType', 255);
            $table->float('GPA');
            $table->float('CreditsRequirement');
            $table->text('Other');

            $table->foreign('CourseID')
                ->references('CourseID')
                ->on('courses')
                ->onDelete('cascade');
            $table->foreign('PrerequisiteCourseID')
                ->references('CourseID')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('prerequisites');
    }
};
