<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalistsAccsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('journalists_accs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fname');
			$table->string('lname');
			$table->boolean('type_acc');
			$table->boolean('status');
			$table->decimal('price');
			$table->integer('target');
			$table->string('img');
			$table->string('email');
			$table->string('password');
			$table->string('sections_controls');
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
		Schema::drop('journalists_accs');
	}

}
