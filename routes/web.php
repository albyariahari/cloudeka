<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sitemap.xml', 'SitemapXmlController@index');

Auth::routes(['register' => false]);

Route::get('/sample', function () {
    echo \Storage::get('uploads/0TGE2EhCnCRt0oi4mTIKe4WBXMc5s2rit8Xw97qD.png');
});

Route::get('media/{file?}', 'HomeController@media')->name('media');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::post('upload-ckeditor', 'HomeController@uploadImage');
    Route::get('/', 'HomeController@index')->name('admin.home.index');
    Route::resource('role', RoleController::class, ['as' => 'admin']);
    Route::resource('user', UserController::class, ['as' => 'admin']);
    Route::resource('product/category', ProductCategoryController::class, ['as' => 'admin.product']);
    Route::resource('product', ProductController::class, ['as' => 'admin']);
    Route::resource('news/category', NewsCategoryController::class, ['as' => 'admin.news']);
    Route::resource('news', NewsController::class, ['as' => 'admin']);
    Route::resource('solution', SolutionController::class, ['as' => 'admin']);
    Route::resource('calculator/component', CalculatorComponentController::class, ['as' => 'admin.calculator']);
    Route::resource('calculator/component/{component}/sub', CalculatorComponentSubController::class, ['as' => 'admin.calculator.component']);
    Route::resource('calculator', CalculatorController::class, ['as' => 'admin']);
    Route::resource('package', PackageController::class, ['as' => 'admin']);
    Route::resource('package-type', PackageTypeController::class, ['as' => 'admin']);
    Route::post('package/item/set-featured/{package_id}/{item_id}', 'PackageItemController@setFeatured')->name('admin.package.item.set-featured');
    Route::post('package/item/remove-featured/{package_id}/{item_id}', 'PackageItemController@removeFeatured')->name('admin.package.item.remove-featured');
    Route::resource('package/{package}/item', PackageItemController::class, ['as' => 'admin.package']);

    Route::group(['prefix' => 'page'], function () {
        Route::get('/', 'PageController@index')->name('admin.page.index');
        Route::get('{page}/edit', 'PageController@edit')->name('admin.page.edit');
        Route::put('{page}', 'PageController@update')->name('admin.page.update');
    });

    Route::prefix('join-programs')->group(function () {
        Route::prefix('partnership-types/{id}')->group(function () {
            Route::put('move/{move?}', 'PartnershipTypeController@move')->name('admin.join-programs.partnership-types.move');
            Route::put('toggle/{toggle?}', 'PartnershipTypeController@toggle')->name('admin.join-programs.partnership-types.toggle');
        });
        Route::resource('partnership-types', PartnershipTypeController::class, ['as' => 'admin.join-programs'])
            ->parameters(['partnership-types' => 'id']);

        Route::prefix('solution-interests/{id}')->group(function () {
            Route::put('move/{move?}', 'SolutionInterestController@move')->name('admin.join-programs.solution-interests.move');
            Route::put('toggle/{toggle?}', 'SolutionInterestController@toggle')->name('admin.join-programs.solution-interests.toggle');
        });
        Route::resource('solution-interests', SolutionInterestController::class, ['as' => 'admin.join-programs'])
            ->parameters(['solution-interests' => 'id']);

        Route::resource('messages', JoinProgramController::class, ['as' => 'admin.join-programs'])
            ->parameters(['messages' => 'id'])
            ->only(['index', 'show', 'destroy']);
    });

    /*--- Benefits Route ---*/
    Route::namespace('Benefit')->prefix('benefits')->group(function () {
        Route::prefix('types/{id}')->group(function () {
            Route::put('move/{move?}', 'BenefitTypeController@move')->name('admin.benefits.types.move');
            Route::put('toggle/{toggle?}', 'BenefitTypeController@toggle')->name('admin.benefits.types.toggle');
        });
        Route::resource('types', BenefitTypeController::class, ['as' => 'admin.benefits'])->parameters(['types' => 'id']);

        Route::prefix('{code}')->group(function () {
            Route::prefix('categories/{id}')->group(function () {
                Route::put('move/{move?}', 'BenefitCategoryController@move')->name('admin.benefits.categories.move');
                Route::put('toggle/{toggle?}', 'BenefitCategoryController@toggle')->name('admin.benefits.categories.toggle');

                Route::prefix('upgrades/{upgrade_id}')->group(function () {
                    Route::put('move/{move?}', 'BenefitUpgradeController@move')->name('admin.benefits.upgrades.move');
                    Route::put('toggle/{toggle?}', 'BenefitUpgradeController@toggle')->name('admin.benefits.upgrades.toggle');
                });
                Route::resource('upgrades', BenefitUpgradeController::class, ['as' => 'admin.benefits'])->parameters(['upgrades' => 'upgrade_id']);
            });
            Route::resource('categories', BenefitCategoryController::class, ['as' => 'admin.benefits'])->parameters(['categories' => 'id']);
        });

        Route::prefix('levels/{id}')->group(function () {
            Route::put('move/{move?}', 'BenefitLevelController@move')->name('admin.benefits.levels.move');
            Route::put('toggle/{toggle?}', 'BenefitLevelController@toggle')->name('admin.benefits.levels.toggle');
        });
        Route::resource('levels', BenefitLevelController::class, ['as' => 'admin.benefits'])->parameters(['levels' => 'id']);
    });

    Route::prefix('tabulator/{code}')->group(function () {
        Route::prefix('update')->group(function () {
            Route::post('column', 'TabulatorController@updateColumn')->name('admin.tabulator.update.column');
            Route::post('row', 'TabulatorController@updateRow')->name('admin.tabulator.update.row');
            Route::delete('column', 'TabulatorController@destroyColumn')->name('admin.tabulator.destroy.column');
            Route::delete('row', 'TabulatorController@destroyRow')->name('admin.tabulator.destroy.row');
        });
        Route::get('', 'TabulatorController@index')->name('admin.tabulator.index');
    });

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', 'SliderController@index')->name('admin.slider.index');
        Route::resource('/{slider}/item', SliderItemController::class, ['as' => 'admin.slider'])->except([
            'show'
        ]);

        Route::put('/{slider}/item/{item}/{order}', 'SliderItemController@move')->name('admin.slider.item.move');
        Route::post('/{slider}/item/{item}/get-translatable', 'SliderItemController@ajaxGetTranslatable')->name('admin.slider.item.ajax.get-translatable');
    });

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', 'ClientController@index')->name('admin.clients.index');

        Route::get('create', 'ClientController@create')->name('admin.clients.create');
        Route::post('store', 'ClientController@store')->name('admin.clients.store');

        Route::prefix('{id}')->group(function () {
            Route::get('edit', 'ClientController@edit')->name('admin.clients.edit');
            Route::put('update', 'ClientController@update')->name('admin.clients.update');
            Route::put('status/{action}', 'ClientController@status')->name('admin.clients.status');

            Route::delete('destroy', 'ClientController@destroy')->name('admin.clients.destroy');
        });
    });
    Route::group(['prefix' => 'partners'], function () {
        Route::get('/', 'PartnerController@index')->name('admin.partners.index');

        Route::get('create', 'PartnerController@create')->name('admin.partners.create');
        Route::post('store', 'PartnerController@store')->name('admin.partners.store');

        Route::prefix('{id}')->group(function () {
            Route::get('edit', 'PartnerController@edit')->name('admin.partners.edit');
            Route::put('update', 'PartnerController@update')->name('admin.partners.update');

            Route::delete('destroy', 'PartnerController@destroy')->name('admin.partners.destroy');
        });
    });
    Route::group(['prefix' => 'use-cases'], function () {
        Route::get('/', 'UseCaseController@index')->name('admin.use-cases.index');

        Route::get('create', 'UseCaseController@create')->name('admin.use-cases.create');
        Route::post('store', 'UseCaseController@store')->name('admin.use-cases.store');

        Route::prefix('{id}')->group(function () {
            Route::get('edit', 'UseCaseController@edit')->name('admin.use-cases.edit');
            Route::put('update', 'UseCaseController@update')->name('admin.use-cases.update');

            Route::put('status/{action}', 'UseCaseController@status')->name('admin.use-cases.status');

            Route::delete('destroy', 'UseCaseController@destroy')->name('admin.use-cases.destroy');
        });
    });

    Route::prefix('promotion')->group(function () {
        Route::get('', 'PromotionController@index')->name('admin.promotion.index');

        Route::get('create', 'PromotionController@create')->name('admin.promotion.create');
        Route::post('store', 'PromotionController@store')->name('admin.promotion.store');

        Route::prefix('{id}')->group(function () {
            Route::get('edit', 'PromotionController@edit')->name('admin.promotion.edit');
            Route::put('update', 'PromotionController@update')->name('admin.promotion.update');

            Route::delete('destroy', 'PromotionController@destroy')->name('admin.promotion.destroy');

            Route::post('get-translatable', 'PromotionController@ajaxGetTranslatable')->name('admin.promotion.ajax.get-translatable');
            Route::put('set-popup/{action}', 'PromotionController@ajaxSetPopup')->name('admin.promotion.ajax.set-popup');
        });
    });

    Route::group(['prefix' => 'documentations'], function () {
        Route::get('/', 'DocumentationController@index')->name('admin.documentations.index');

        Route::get('create', 'DocumentationController@create')->name('admin.documentations.create');
        Route::post('store', 'DocumentationController@store')->name('admin.documentations.store');
        Route::post('upload', 'DocumentationController@upload')->name('admin.documentations.upload');

        Route::prefix('{id}')->group(function () {
            Route::get('edit', 'DocumentationController@edit')->name('admin.documentations.edit');
            Route::get('sort', 'DocumentationController@sort')->name('admin.documentations.sort');
            Route::put('update', 'DocumentationController@update')->name('admin.documentations.update');

            Route::delete('destroy', 'DocumentationController@destroy')->name('admin.documentations.destroy');
            Route::post('publish', 'DocumentationController@publish')->name('admin.documentations.publish');
            Route::post('draft', 'DocumentationController@draft')->name('admin.documentations.draft');
        });

        Route::prefix('ajax')->group(function () {
            Route::post('upload', 'DocumentationController@ajaxUpload')->name('admin.documentations.ajax.upload');
            Route::post('store-all', 'DocumentationController@ajaxStoreAll')->name('admin.documentations.ajax.store-all');
            Route::post('update-all/{id}', 'DocumentationController@ajaxUpdateAll')->name('admin.documentations.ajax.update-all');
            Route::post('sort/{id}', 'DocumentationController@ajaxSort')->name('admin.documentations.ajax.sort');
        });

        Route::prefix('feedback')->group(function () {
            Route::get('/', 'FeedbackController@index')->name('admin.documentations.feedback.index');
            Route::group(['prefix' => '{id}'], function () {
                Route::get('show', 'FeedbackController@show')->name('admin.documentations.feedback.show');
                Route::delete('destroy', 'FeedbackController@destroy')->name('admin.documentations.feedback.destroy');
            });
        });
    });

    Route::group(['prefix' => 'faq'], function () {
        Route::group(['prefix' => 'category'], function () {
            Route::get('', 'FaqCategoryController@index')->name('admin.faq.category.index');

            Route::get('create', 'FaqCategoryController@create')->name('admin.faq.category.create');
            Route::post('store', 'FaqCategoryController@store')->name('admin.faq.category.store');

            Route::prefix('{id}')->group(function () {
                Route::get('edit', 'FaqCategoryController@edit')->name('admin.faq.category.edit');
                Route::put('update', 'FaqCategoryController@update')->name('admin.faq.category.update');
                Route::put('move/{action}', 'FaqCategoryController@move')->name('admin.faq.category.move');

                Route::delete('destroy', 'FaqCategoryController@destroy')->name('admin.faq.category.destroy');
            });
        });

        Route::group(['prefix' => '{slug}'], function () {
            Route::get('', 'FaqController@index')->name('admin.faq.index');

            Route::get('create', 'FaqController@create')->name('admin.faq.create');
            Route::post('store', 'FaqController@store')->name('admin.faq.store');

            Route::prefix('{id}')->group(function () {
                Route::get('edit', 'FaqController@edit')->name('admin.faq.edit');
                Route::put('update', 'FaqController@update')->name('admin.faq.update');
                Route::put('move/{action}', 'FaqController@move')->name('admin.faq.move');

                Route::delete('destroy', 'FaqController@destroy')->name('admin.faq.destroy');

                Route::post('get-translatable', 'FaqController@ajaxGetTranslatable')->name('admin.faq.ajax.get-translatable');

                Route::prefix('item')->group(function () {
                    Route::get('', 'FaqItemController@index')->name('admin.faq.item.index');

                    Route::get('create', 'FaqItemController@create')->name('admin.faq.item.create');
                    Route::post('store', 'FaqItemController@store')->name('admin.faq.item.store');

                    Route::prefix('{item_id}')->group(function () {
                        Route::get('edit', 'FaqItemController@edit')->name('admin.faq.item.edit');
                        Route::put('update', 'FaqItemController@update')->name('admin.faq.item.update');
                        Route::put('move/{action}', 'FaqItemController@move')->name('admin.faq.item.move');

                        Route::delete('destroy', 'FaqItemController@destroy')->name('admin.faq.item.destroy');

                        Route::post('get-translatable', 'FaqItemController@ajaxGetTranslatable')->name('admin.faq.item.ajax.get-translatable');
                    });
                });
            });
        });
    });

    Route::resource('{module}/{content_id}/content', DynamicContentController::class, ['as' => 'admin'])->except([
        'show'
    ]);

    Route::group(['prefix' => 'message'], function () {
        Route::get('', 'MessageController@index')->name('admin.message.index');

        Route::group(['prefix' => '{id}'], function () {
            Route::get('show', 'MessageController@show')->name('admin.message.show');

            Route::delete('destroy', 'MessageController@destroy')->name('admin.message.destroy');
        });
    });

    Route::group(['prefix' => 'subscriber'], function () {
        Route::get('', 'SubscriberController@index')->name('admin.subscriber.index');
        Route::get('export', 'SubscriberController@export')->name('admin.subscriber.export');

        Route::delete('{id}/delete', 'SubscriberController@destroy')->name('admin.subscriber.destroy');
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/website', 'SettingController@edit')->name('admin.setting.website');
        Route::post('/', 'SettingController@update')->name('admin.setting.update');
    });

    Route::group(['prefix' => 'backup'], function () {
        Route::get('/', 'BackupController@index')->name('admin.backup.index');
        Route::get('/download', 'BackupController@download')->name('admin.backup.download');
    });
});

Route::prefix(LaravelLocalization::setLocale())->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('404', 'HomeController@pageErrors')->name('errors-page');
    Route::get('500', 'HomeController@pageError')->name('error-page');
    // Route::view('/404', 'errors.404');
    Route::get('why-us', 'HomeController@whyUs')->name('why-us');
    Route::get('products', 'ProductController@index')->name('product.index');
    Route::get('products/{slug}', 'ProductController@show')->name('product.show');
    Route::get('solutions', 'SolutionController@index')->name('solution.index');
    Route::get('solutions/{slug}', 'SolutionController@show')->name('solution.show');
    Route::get('contact-us', 'HomeController@contactUs')->name('contact-us');
    Route::get('join-program', 'HomeController@joinProgram')->name('join-program');
    Route::post('join-program/send', 'HomeController@joinProgramSend')->name('join-program.send');
    Route::get('become-partner', 'HomeController@becomePartner')->name('become-partner');

    Route::prefix('documentation')->group(function () {
        Route::get('', 'HomeController@documentation')->name('documentation');
        Route::get('search', 'HomeController@documentationSearch')->name('documentation.search');
        Route::get('detail', 'HomeController@documentationDetail2')->name('documentation-detail-2');
        Route::get('preview/{id}/{name}', 'HomeController@documentationPreview')->name('documentation.preview');
        Route::get('preview/{id}/{name}/{childid}/{childname}', 'HomeController@documentationPreview')->name('documentation.preview.child');
        Route::get('preview/{id}/{name}/{childid}/{childname}/{grandchildid}/{grandchildname}', 'HomeController@documentationPreview')->name('documentation.preview.grandchild');
        Route::get('{id}/{name}', 'HomeController@documentationDetail')->name('documentation.detail');
        Route::get('{id}/{name}/{childid}/{childname}', 'HomeController@documentationDetail')->name('documentation.child');
        Route::get('{id}/{name}/{childid}/{childname}/{grandchildid}/{grandchildname}', 'HomeController@documentationDetail')->name('documentation.grandchild');


        Route::prefix('get')->group(function () {
            Route::post('products', 'HomeController@documentationAjaxGetProducts')->name('documentation.get.products');
            Route::post('docs', 'HomeController@documentationAjaxGetDocs')->name('documentation.get.docs');
        });

        Route::prefix('search')->group(function () {
            Route::post('products', 'HomeController@documentationAjaxSearchProducts')->name('documentation.search.products');
            Route::post('docs', 'HomeController@documentationAjaxSearchDocs')->name('documentation.search.docs');
        });
    });

    Route::get('calculator', 'HomeController@calculator')->name('calculator');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::post('faq/get', 'HomeController@faqAjaxGet')->name('faq.ajax.get');
    Route::get('search', 'HomeController@search')->name('search');

    Route::post('subscribe', 'SubscriberController@subscribe')->name('subscribe');
    Route::post('send', 'MessageController@send')->name('message.send');

    Route::get('news', 'HomeController@news')->name('news');
    Route::post('news', 'HomeController@Ajaxnews')->name('news.ajax');
    Route::get('news/{category}', 'HomeController@newsCategory')->name('news.category');
    Route::get('news/{category}/{slug}', 'HomeController@newsDetail')->name('news.detail');
});

// Route::get('products', function () {
//     return view('product-list');
// });

// Route::prefix('products')->group(function () {
//     Route::get('/cloud-premium', function () {
//         return view('products.cloud-premium');
//     })->name('products.cloud-premium');
//     Route::get('/cloud-lite', function () {
//         return view('products.cloud-lite');
//     })->name('products.cloud-lite');
//     Route::get('/cloud-safe', function () {
//         return view('products.cloud-safe');
//     })->name('products.cloud-safe');
//     Route::get('/cloud-priority', function () {
//         return view('products.cloud-priority');
//     })->name('products.cloud-priority');
//     Route::get('/cloud-bucket', function () {
//         return view('products.cloud-bucket');
//     })->name('products.cloud-bucket');
//     Route::get('/cloud-deploy', function () {
//         return view('products.cloud-deploy');
//     })->name('products.cloud-deploy');
//     Route::get('/media-analytics', function () {
//         return view('products.media-analytics');
//     })->name('products.media-analytics');
//     Route::get('/intelligent-video-analytics', function () {
//         return view('products.intelligent-video-analytics');
//     })->name('products.intelligent-video-analytics');
//     Route::get('/next-generation-firewall', function () {
//         return view('products.next-generation-firewall');
//     })->name('products.next-generation-firewall');
//     Route::get('/load-balancer', function () {
//         return view('products.load-balancer');
//     })->name('products.load-balancer');
//     Route::get('/web-application-firewall', function () {
//         return view('products.web-application-firewall');
//     })->name('products.web-application-firewall');
// });

// Route::get('solutions', function () {
//     return view('solution-list');
// });

// Route::get('solution/detail', function () {
//     return view('solution-detail');
// });

// Route::prefix('solutions')->group(function () {
//     Route::get('/banking', function () {
//         return view('solutions.banking');
//     })->name('solutions.banking');
//     Route::get('/government', function () {
//         return view('solutions.government');
//     })->name('solutions.government');
//     Route::get('/finance-non-bank', function () {
//         return view('solutions.finance-non-bank');
//     })->name('solutions.finance-non-bank');
//     Route::get('/resources', function () {
//         return view('solutions.resources');
//     })->name('solutions.resources');
//     Route::get('/plantation', function () {
//         return view('solutions.plantation');
//     })->name('solutions.plantation');
//     Route::get('/manufacture', function () {
//         return view('solutions.manufacture');
//     })->name('solutions.manufacture');
//     Route::get('/higher-education', function () {
//         return view('solutions.higher-education');
//     })->name('solutions.higher-education');
//     Route::get('/hospital', function () {
//         return view('solutions.hospital');
//     })->name('solutions.hospital');
//     Route::get('/telco', function () {
//         return view('solutions.telco');
//     })->name('solutions.telco');
//     Route::get('/digital-company', function () {
//         return view('solutions.digital-company');
//     })->name('solutions.digital-company');
// });

Route::get('/prototype', function () {
    return view('pages.prototype');
});
Route::get('/mail', function () {
    return view('emails.send-estimation-prototype');
})->name('mail');

// File::put('404.html',
//     view('resources.views.errors.404')
//         ->render()
// );
// File::put('500.html',
//     view('resources.views.errors.500')
//         ->render()
// );