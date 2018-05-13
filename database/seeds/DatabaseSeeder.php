<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();


        $usersQuantity = 100;


        factory(User::class, $usersQuantity)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
