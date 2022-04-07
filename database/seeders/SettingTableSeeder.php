<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = getcwd() . '/database/seeders/settings.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Settings table seeded!');
    }
}
