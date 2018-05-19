<?php

use App\Resume;
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
        Resume::truncate();


        $usersQuantity = 100;
        $resumeQuantity = 50;


        factory(User::class, $usersQuantity)->create();
        factory(Resume::class, $resumeQuantity)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
