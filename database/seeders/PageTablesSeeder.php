<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Home',
                'anchor' => 'home',
            ],
            [
                'title' => 'Why Us',
                'anchor' => 'why-us',
            ],
            [
                'title' => 'Product',
                'anchor' => 'product',
            ],
            [
                'title' => 'Solution',
                'anchor' => 'solution',
            ],
            [
                'title' => 'Pricing Calculator',
                'anchor' => 'pricing-calculator',
            ],
            [
                'title' => 'Documentation',
                'anchor' => 'documentation',
            ],
            [
                'title' => 'FAQ',
                'anchor' => 'faq',
            ],
            [
                'title' => 'Contact Us',
                'anchor' => 'contact-us',
            ],
        ];

        $section = [];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
