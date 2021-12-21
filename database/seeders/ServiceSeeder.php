<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();

        $services = array(
            [
                'id' => 1,
                'name' => 'Oil change',
                'description' => '',
                'amount' => 4200,
            ], [
                'id' => 2,
                'name' => 'Filter change',
                'description' => '',
                'amount' => 2500,
            ], [
                'id' => 3,
                'name' => 'Belt Change',
                'description' => '',
                'amount' => 10300,
            ], [
                'id' => 4,
                'name' => 'General Review',
                'description' => '',
                'amount' => 1000,
            ],[
                'id' => 5,
                'name' => 'Other',
                'description' => '',
                'amount' => 3000,
            ],
        );

        DB::table('services')->insert($services);
    }
}
