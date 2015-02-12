<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIp2countryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('laravel_ip2country');

		Schema::create('laravel_ip2country', function($table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->string('start_ip');
			$table->string('end_ip');
			$table->integer('start_ip_long')->unsigned();
			$table->integer('end_ip_long')->unsigned();
			$table->string('country_code', 2);
			$table->string('country_name', 64);
		});

		$csvData = file_get_contents(__DIR__ . '/../storage/201502-GeoIPCountryWhois.csv');
		//$csvData = str_getcsv($csvData);
		//
		$dataArray = str_getcsv($csvData, "\n"); //parse the rows
		echo "Loading IP Mappings [";
		foreach($dataArray as $row)
		{
			$row = str_getcsv($row);
			echo ".";
			DB::table('laravel_ip2country')->insert([
				'start_ip' => $row[0],
				'end_ip' => $row[1],
				'start_ip_long' => $row[2],
				'end_ip_long' => $row[3],
				'country_code' => $row[4],
				'country_name' => $row[5],
			]);
		}
		echo "]\n";
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
