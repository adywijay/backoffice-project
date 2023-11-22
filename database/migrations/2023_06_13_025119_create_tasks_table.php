<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('category');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('link');
            $table->enum('status', ['To-Do', 'Inprogress', 'Complete', 'Review']);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('author_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
