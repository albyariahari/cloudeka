<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            [
                'name' => 'Microsoft',
                'logo' => 'imgs/why-us/microsoft.jpg'
            ],
            [
                'name' => 'VMware',
                'logo' => 'imgs/why-us/vmware.jpg'
            ],
            [
                'name' => 'NetApp',
                'logo' => 'imgs/why-us/netapp.jpg'
            ],
            [
                'name' => 'RedHat',
                'logo' => 'imgs/why-us/netapp.jpg'
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
