<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

// Model(s)
use App\Models\FaqCategory;
use App\Models\Module;

// Service(s)
use App\Services\Benefit\BenefitTypeService;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(BenefitTypeService $typeService, Dispatcher $events)
    {
        // URL::forceScheme('https');
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
        $content_management = [
            [
                'text' => 'Page Section',
                'url'  => 'admin/page'
            ],
            [
                'text' => 'Slideshow',
                'url'  => 'admin/slider'
            ],
            [
                'text' => 'Clients',
                'url'  => 'admin/clients'
            ],
            [
                'text' => 'Partners',
                'url'  => 'admin/partners'
            ],
            [
                'text' => 'Use Cases',
                'url'  => 'admin/use-cases'
            ]
        ];

        if (Schema::hasTable("modules")) {
            $content = Module::all() ?? [];

            foreach ($content as $key => $val) {
                $content_management[] = [
                    'text' => $val->name,
                    'url' => "/admin/{$val->controller}"
                ];
            }
        }

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($typeService, $content_management) {
            /*-- Dashboard --*/
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => '/admin',
                'icon' => 'fas fa-fw fa-home'
            ]);
            /*-- /Dashboard --*/

            /*-- User Management --*/
            $event->menu->add('USERS MANAGEMENT');
            /*-- User Module --*/
            $event->menu->add([
                'text' => 'User',
                'url' => 'admin/user',
                'icon' => 'fas fa-fw fa-user'
            ]);
            /*-- /User Module --*/

            /*-- Role Module --*/
            $event->menu->add([
                'text' => 'Role',
                'url' => 'admin/role',
                'icon' => 'fas fa-fw fa-tasks'
            ]);
            /*-- /Role Module --*/

            /*-- Web Management --*/
            $event->menu->add('WEB MANAGEMENT');
            /*-- Product Module --*/
            $event->menu->add([
                'text' => 'Product',
                'icon' => 'fas fa-fw fa-user',
                'submenu' => [
                    [
                        'text' => 'Category',
                        'url'  => 'admin/product/category'
                    ],
                    [
                        'text' => 'Product',
                        'url'  => 'admin/product'
                    ]
                ]
            ]);
            /*-- /Product Module --*/
			
			/*-- Benefits Module --*/
			$categories = [];
			
			foreach ($typeService->Get() as $type) {
				$categories[] = [
					'text' => $type->name, 
					'url'  => route('admin.benefits.categories.index', [$type->code]), 
					'icon' => 'fas fa-fw fa-file',
				];
			}

            // $categories[] = [
            //     'text' => 'Reseller Benefit', 
            //     'url'  => route('admin.benefits.categories.index', ['reseller-benefit', 'lang' => 'en']), 
            //     'icon' => 'fas fa-fw fa-file',
            // ];

            // $categories[] = [
            //     'text' => 'Wholesales Benefit', 
            //     'url'  => route('admin.benefits.categories.index', ['wholesales-benefit', 'lang' => 'en']), 
            //     'icon' => 'fas fa-fw fa-file',
            // ];
			
			$categories[] = [
				'text' => 'Levels', 
				'url'  => route('admin.benefits.levels.index'), 
				'icon' => 'fas fa-fw fa-file', 
			];
			
			$event->menu->add([
				'text' => 'Benefits', 
				'url'  => '', 
				'icon' => 'fas fa-fw fa-share', 
				'submenu' => $categories, 
			]);
			
			/*-- Tabulator Module --*/
			$event->menu->add([
				'text' => 'Partner Programs', 
				'url'  => '', 
				'icon' => 'fas fa-fw fa-share', 
				'submenu' => [
					[
						'text' => 'Reseller Tier', 
						'url'  => route('admin.tabulator.index', [ 'reseller-tier', 'lang' => 'en' ]), 
						'icon' => 'fas fa-fw fa-file', 
					], 
					[
						'text' => 'Wholesales Tier', 
						'url'  => route('admin.tabulator.index', [ 'wholesales-tier', 'lang' => 'en' ]), 
						'icon' => 'fas fa-fw fa-file', 
					], 
				], 
			]);
			/*-- Tabulator Module --*/
			
			/*-- Join Programs Module --*/
			$event->menu->add([
				'text' => 'Join Programs', 
				'url'  => '', 
				'icon' => 'fas fa-fw fa-share', 
				'submenu' => [
					[
						'text' => 'Partnership Types', 
						'url'  => route('admin.join-programs.partnership-types.index'), 
						'icon' => 'fas fa-fw fa-file', 
					], 
					[
						'text' => 'Solution Interests', 
						'url'  => route('admin.join-programs.solution-interests.index'), 
						'icon' => 'fas fa-fw fa-file', 
					], 
					[
						'text' => 'Partner Registrations', 
						'url'  => route('admin.join-programs.messages.index'), 
						'icon' => 'fas fa-fw fa-file', 
					], 
				]
			]);
			/*-- Join Programs Module --*/
			
            /*-- Solution Module --*/
            $event->menu->add([
                'text' => 'Solution',
                'url' => 'admin/solution',
                'icon' => 'far fa-fw fa-file'
            ]);
            /*-- /Solution Module --*/

            /*-- Calculator Module --*/
            $event->menu->add([
                'text' => 'Calculator',
                'icon' => 'fas fa-fw fa-share',
                'submenu' => [
                    [
                        'text' => 'Calculator',
                        'url'  => 'admin/calculator'
                    ],
                    [
                        'text' => 'Component',
                        'url'  => 'admin/calculator/component'
                    ]
                ]
            ]);
            /*-- /Calculator Module --*/

            /*-- Promotion Module --*/
            $event->menu->add([
                'text' => 'Promotion',
                'icon' => 'fas fa-fw fa-share',
                'url'  => 'admin/promotion'
            ]);
            /*-- /Promotion Module --*/

            /*-- Documentation Module --*/
            $event->menu->add([
                'text' => 'Documentation',
                'icon' => 'fas fa-fw fa-share',
                'submenu' => [
                    [
                        'text' => 'Documentation',
                        'url'  => 'admin/documentations'
                    ],
                    [
                        'text' => 'Feedback',
                        'url'  => 'admin/documentations/feedback'
                    ]
                ]  
            ]);
            /*-- /Documentation Module --*/

            /*-- FAQ Module --*/
            $subs[0]['text'] = 'Category';
            $subs[0]['url'] = route('admin.faq.category.index');

            if ($categories = FaqCategory::orderBy('title')->get()) {
                foreach ($categories as $val) {
                    $arr = [];
                    $arr['text'] = $val->title;
                    $arr['url'] = route('admin.faq.index', $val->slug);
                    $subs[] = $arr;
                }
            }

            $event->menu->add([
                'text' => 'FAQ',
                'icon' => 'fas fa-fw fa-share',
                'submenu' => $subs
            ]);
            /*-- /FAQ Module --*/
            
            /*-- Join Programs Module --*/
			$event->menu->add([
				'text' => 'Package', 
				'url'  => '', 
				'icon' => 'fas fa-fw fa-share', 
				'submenu' => [
					[
						'text' => 'Package List', 
						'url'  => 'admin/package', 
						'icon' => 'fas fa-fw fa-file', 
					], 
					[
						'text' => 'Package Type', 
						'url'  => 'admin/package-type', 
						'icon' => 'fas fa-fw fa-file', 
					]
				]
			]);
			/*-- Join Programs Module --*/

            /*-- Content Management Module --*/
            $event->menu->add([
                'text' => 'Content Management',
                'icon' => 'fas fa-fw fa-share',
                'submenu' => $content_management,
            ]);
            /*-- /Content Management Module --*/

            /*-- Message Module --*/
            $event->menu->add([
                'text' => 'Message',
                'icon' => 'fas fa-fw fa-share',
                'url' => 'admin/message'
            ]);
            /*-- /Message Module --*/

            /*-- Subscriber Module --*/
            $event->menu->add([
                'text' => 'Subscriber',
                'icon' => 'fas fa-fw fa-share',
                'url' => 'admin/subscriber'
            ]);
            /*-- /Subscriber Module --*/

            /*-- News Management Module --*/
            $event->menu->add([
                'text' => 'News Management',
                'icon' => 'fas fa-fw fa-share',
                'submenu' =>  [
                    [
                        'text' => 'Category',
                        'url'  => 'admin/news/category'
                    ],
                    [
                        'text' => 'News',
                        'url'  => 'admin/news'
                    ]
                ],
            ]);
            /*-- /Content Management Module --*/
            /*-- /Web Management --*/

            /*-- Administrator --*/
            $event->menu->add('ADMINISTRATOR');
            /*-- Website Setting Module --*/
            $event->menu->add([
                'text' => 'Website',
                'url' => 'admin/setting/website',
                'icon' => 'fas fa-fw fa-user'
            ]);
            $event->menu->add([
                'text' => 'Backup',
                'url' => 'admin/backup',
                'icon' => 'far fa-fw fa-file'
            ]);
            /*-- /Website Setting Module --*/
            /*-- /Administrator --*/
        });

        Schema::defaultstringLength(255);

        /*
		 * Relation Morph Many Map
		 */
        Relation::morphMap([
            'module' => 'App\Models\Module',
        ]);

        \Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
