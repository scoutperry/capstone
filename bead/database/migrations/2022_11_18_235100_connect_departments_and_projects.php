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
        Schema::table('projects', function (Blueprint $table) {

            # Remove the field associated with the old way we were storing departments
            # Can do this here, or update the original migration that creates the `projects` table
            $table->dropColumn('department');

            # Add a new bigint field called `department_id` 
            # has to be unsigned (i.e. positive)
            # nullable so it's possible to have a rating without a department
            $table->bigInteger('department_id')->unsigned()->nullable();

            # This field `department_id` is a foreign key that connects to the `id` field in the `departments` table
            $table->foreign('department_id')->references('id')->on('departments');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('ratings_department_id_foreign');
    
            $table->dropColumn('department_id');
        });
    }
};
