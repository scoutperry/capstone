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
            $table->timestamps();
            $table->string('slug');
            $table->string('title');
            $table->string('staff_first');
            $table->string('staff_last');
            $table->string('department');
            $table->string('location');
            $table->string('additional_staff')->nullable();
            $table->smallInteger('estimated_cost');
            $table->string('additional_equip')->nullable();
            $table->string('additional_services')->nullable();
            $table->text('summary');
            $table->string('has_dependent')->nullable();
            $table->string('depends_on')->nullable();
            $table->string('estimated_duration');
            $table->date('start_date');
            $table->date('end_date');


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
