<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaravelIpcountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Since there is a new file, to keep people from loading multiple verisons, then dropping it
	        // in favor of the new, killing up "up" migration, while preserving the down so anyone who updates
	        // the package, but doesn't run the migration, can still roll back.
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('laravel_ip2country');
	}

}
