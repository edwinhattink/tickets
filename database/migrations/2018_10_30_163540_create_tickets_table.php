<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			
			$table->unsignedInteger('ticket_type_id');
			$table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
			
			$table->unsignedInteger('event_id');
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			
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
        Schema::dropIfExists('tickets');
    }
}
