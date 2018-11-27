<?php

use Illuminate\Database\Seeder;
use App\employees;

class employeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(employees::class,20)->create();
    }
}
