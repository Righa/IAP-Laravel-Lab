<?php

use Illuminate\Database\Seeder;

class CarMaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
        	'make' => 'Acura',
        	'model' => 'rdx',
        	'produced_on' => '2020-07-03',
        	'avatar' => '1594853695.jpg',
        ]);
        DB::table('cars')->insert([
        	'make' => 'Stelvio',
        	'model' => 'alpha-romeo',
        	'produced_on' => '2020-07-03',
        	'avatar' => '1594853751.jpg',
        ]);
        DB::table('cars')->insert([
        	'make' => 'Audi',
        	'model' => 'q3',
        	'produced_on' => '2020-07-03',
        	'avatar' => '1594853824.jpg',
        ]);
        DB::table('cars')->insert([
        	'make' => 'BMW',
        	'model' => 'x2',
        	'produced_on' => '2020-07-03',
        	'avatar' => '1594853882.jpg',
        ]);
        DB::table('cars')->insert([
        	'make' => 'Buick',
        	'model' => 'enclave',
        	'produced_on' => '2020-07-03',
        	'avatar' => '1594853934.jpg',
        ]);
    }
}
