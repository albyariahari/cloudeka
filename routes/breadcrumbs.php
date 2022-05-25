<?php
    //home

use PhpOffice\PhpSpreadsheet\Calculation\Category;

    Breadcrumbs::for('home', function ($trail) {
        $trail->push('Home', route('home'));
    });
    //home->why-us
    Breadcrumbs::for('why-us', function ($trail) {
        $trail->parent('home');
        $trail->push('Why Us', route('why-us'));
    });
    //home->products
    Breadcrumbs::for('products', function ($trail) {
        $trail->parent('home');
        $trail->push('Products', route('product.index'));
    });
    //home->products->show detail product
    Breadcrumbs::for('products.show', function ($trail, $productTranslate) {
        $trail->parent('products');
        $trail->push($productTranslate->title, route('product.show',$productTranslate->id));
    });
    //home->solutions
    Breadcrumbs::for('solutions', function ($trail) {
        $trail->parent('home');
        $trail->push('Solutions', route('solution.index'));
    });
    //home->solutions->show detail solution
    Breadcrumbs::for('solutions.show', function ($trail, $solutionTranslate) {
        $trail->parent('solutions');
        $trail->push($solutionTranslate->title, route('solution.show',$solutionTranslate->id));
    });

    //home->news&events
    Breadcrumbs::for('news', function ($trail) {
        $trail->parent('home');
        $trail->push('News & Events', route('news'));
    });
    //home->news&events->all articles-> show detail articles
    Breadcrumbs::for('all articles', function ($trail,$banner) {
        $trail->parent('news');
        $trail->push($banner->title, route('news.detail',$banner->title));
    });
    //home->calculator
    // Breadcrumbs::for('calculator', function ($trail) {
    //     $trail->parent('home');
    //     $trail->push('Calculator', route('calculator'));
    // });
    //home->contact us
    Breadcrumbs::for('contact-us', function ($trail) {
        $trail->parent('home');
        $trail->push('Contact Us', route('contact-us'));
    });
?>
