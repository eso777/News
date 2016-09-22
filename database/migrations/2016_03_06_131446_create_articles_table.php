<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('content');
			$table->integer('status');
			$table->integer('writer');
			$table->string('notes');
			$table->text('images');
			$table->integer('categories_id');
			$table->integer('atricle_type');
			$table->integer('views');
			$table->integer('choosen');
			$table->integer('main_slider');
			$table->integer('update_by');
			$table->string('slug');
			/*================= SEO =============*/
			$table->string('tags');
			$table->text('description');
			/*================= SEO =============*/

			/*================= TimeStamps =============*/
			$table->timestamp('published_at');
			$table->timestamps();
			$table->softDeletes();
			/*================= TimeStamps =============*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
