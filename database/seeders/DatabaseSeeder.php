<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $path = getcwd() . '/database/seeders/full-web.sql';
        \DB::unprepared(file_get_contents($path));
        $this->command->info('Settings table seeded!');

        // $this->call([
        //     PermissionTableSeeder::class,
        //     UsersTableSeeder::class,
        //     PartnerTableSeeder::class,
        //     ClientTableSeeder::class,
        //     PageTablesSeeder::class,
        //     SettingTableSeeder::class,
        // ]);
    }
}
