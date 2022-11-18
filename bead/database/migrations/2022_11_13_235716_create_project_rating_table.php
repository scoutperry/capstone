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
        Schema::create('project_rating', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

        # `project_id` and `rating_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `project_id` will reference the `projects` table and `rating_id` will reference the `ratings` table.
        $table->bigInteger('project_id')->unsigned();
        $table->bigInteger('rating_id')->unsigned();

        # Make foreign keys
        $table->foreign('project_id')->references('id')->on('projects');
        $table->foreign('rating_id')->references('id')->on('ratings');

        # (Optional) Add additional columns for data you want to associate with this relationship
        //$table->tinyInteger('grade')->unsigned()->nullable();
        $table->tinyInteger('grade')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_rating');
    }
};
