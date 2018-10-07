<?php

use Illuminate\Database\Seeder;

class OtherTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\user\tag::class , 50 )->create();
        factory(App\Model\user\category::class , 50 )->create();
    }
}
