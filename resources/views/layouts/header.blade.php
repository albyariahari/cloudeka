<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top p-0">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Toggle button -->
    <div class="navbar-toggler mx-2 my-auto mx-sm-4">
      <img class="closed" src="{{ '/imgs/menu-filled.svg' }}">
      <img class="opened" src="{{ '/imgs/menu-x.svg' }}">
    </div>

    <!-- Navbar brand -->
    <a class="navbar-brand mx-auto" href="/">
        <img src="{{ '/imgs/logo.svg' }}" alt="{{ config('app.name', 'Laravel') }}" width="173" height="50">
    </a>

    <div class="mobile-only">
      <ul class="navbar-nav d-flex flex-row me-1 ml-auto">
        <li class="nav-item">
          <a class="nav-link px-0 pl-sm-3 pr-sm-2" href="//cmd.cloudeka.id/" target="_blank"> <i class="icon-account"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-0 mr-2 mr-sm-4" href="#"> <i class="icon-search mr-0"></i></a>
        </li>
      </ul>
    </div>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="header">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('why-us')}}">{{$header_title_pages[2][0]->title}}</a>
        </li>
        <li class="nav-item dropdown has-megamenu">
          <a class="nav-link dropdown-toggle" href="#" data-id="menu-product">{{$header_title_pages[3][0]->title}}</a>
          <div class="dropdown-menu megamenu" id="menu-product" role="menu">
            <div class="container-fluid">
              <div class="row w-100">
                  <div class="col-12 col-lg-2 px-0 left-menu">
                    <ul class="bigmenu-overflow">
                        @foreach ($header_product_categories as $category)
                        <li id="{{$category->slug}}-megamenu-menu" class="{{$loop->index === 0 ? 'shown' : ''}}"><a onclick="detailMenu('{{$category->slug}}-megamenu', 'product')"><span>{{$category->title}}</span></a></li>
                        @endforeach
                    </ul>
                    <a class="btn btn-bordered btn-rounded" href="{{route('product.index')}}">{{ __('title.see_all')}}</a>
                  </div>
                  <div class="col-12 col-lg-10 menu-details">
                    @foreach ($header_product_categories as $category)
                    <div class="content-section {{$loop->index === 0 ? 'shown' : ''}}" id="{{$category->slug}}-megamenu">
                      <p>
                        <b>
                        <a href="#">
                            {{$category->title}}
                        </a>
                      </b>
                      </p>
                      <div class="row">
                        @foreach ($category->Products as $product)
                        <div class="col-12 col-lg-2">
                          <a href="{{ route('product.show',$product->translate($lang)->slug) }}">
                            <p><b>{{ $product->translate($lang)->title }}</b></p>
                            <p>{{$product->translate($lang)->excerpt}}</p>
                          </a>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown has-megamenu">
          <a class="nav-link dropdown-toggle" href="#" data-id="menu-solution">{{ $header_title_pages[4][0]->title }}</a>
          <div class="dropdown-menu megamenu" id="menu-solution" role="menu">
            <div class="container-fluid">
              <div class="row w-100">
                  <div class="col-12 col-lg-2 px-0 left-menu">
                    <ul class="bigmenu-overflow">
                      @foreach ($header_solutions as $solution)

                        <li id="{{$solution->translate($lang)->slug}}-megamenu-menu" class="{{$loop->index === 0 ? 'shown':''}}"><a onclick="detailMenu('{{$solution->translate($lang)->slug}}-megamenu', 'solution')"><span>{{$solution->translate($lang)->title}}</span></a></li>

                      @endforeach
                    </ul>
                    <a class="btn btn-bordered btn-rounded" href="{{route('solution.index')}}">{{ __('title.see_all') }}</a>
                  </div>
                  <div class="col-12 col-lg-10 menu-details">
                    @foreach ($header_solutions as $solution)
                    <div class="content-section {{$loop->index === 0 ? 'shown':''}}" id="{{$solution->translate($lang)->slug}}-megamenu">
                      <p><b>{{$solution->translate($lang)->title}}</b></p>
                      <div class="row justify-content-start">
                        @foreach ($solution->Products as $product)

                        <div class="col-12 col-lg-2">
                          <a href="{{ route('product.show',$product->translate($lang)->slug) }}">
                            <p><b>{{$product->translate($lang)->title}}</b></p>
                            <p>{{$product->translate($lang)->excerpt}}</p>
                          </a>
                        </div>

                        @endforeach
                        <div class="col-12 col-lg-12">
                            <a class="btn btn-bordered btn-rounded" href="{{route('solution.show',$solution->translate($lang)->slug)}}">{{ __('title.see_more') }}</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('news') }}">{!! $header_title_pages[13][0]->title !!}</a>
        </li>
        <li class="nav-item">
          <a 
			class="nav-link" 
			href="{{ route('calculator', ['calculator' => $setting->setting__calculator_link]) }}"
		>{{$header_title_pages[5][0]->title}}</a>
        </li>
        @if($setting->setting__show_documentation == "true")
        <li class="nav-item">
          <a class="nav-link" href="https://docs.cloudeka.id">{{$header_title_pages[6][0]->title}}</a>
        </li>  
        @endif
        
        @if($setting->setting__show_faq == "true")
        <li class="nav-item">
          <a class="nav-link" href="{{ route('faq') }}">{{$header_title_pages[7][0]->title}}</a>
        </li>
        @endif
		
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact-us') }}">{{$header_title_pages[8][0]->title}}</a>
        </li>
        <li class="nav-item dropdown mobile-only" id="languageOption">
          <div class="wrapper-language">
            @if (Route::currentRouteName() === 'product.show')
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('id', route('product.show',$product_slug->translate('id')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    Indonesia
                </a>
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en', route('product.show',$product_slug->translate('en')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    English
                </a>
            @elseif (Route::currentRouteName() === 'solution.show')
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('id', route('solution.show',$solution_slug->translate('id')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    Indonesia
                </a>
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en', route('solution.show',$solution_slug->translate('en')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    English
                </a>
            @elseif (Route::currentRouteName() === 'news.detail')
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('id', route('news.detail', [ $categories['id'], $slugs['id'] ]), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    Indonesia
                </a>
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en', route('news.detail', [ $categories['en'], $slugs['en'] ]), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    English
                </a>
            @else
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('id', null, [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    Indonesia
                </a>
                <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    English
                </a>
            @endif
          </div>
        </li>

      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1 ml-auto desktop-only">
        <li class="nav-item dropdown" id="languageOption">
          <a class="nav-link dropdown-toggle px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="flag-wrapper">
              @if ($lang == 'id')
                <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
              @else
                <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
              @endif
            </div>
          </a>
          <div class="dropdown-menu" aria-labelledby="languageOption">
            @if (Route::currentRouteName() === 'product.show')
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('id', route('product.show',$product_slug->translate('id')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                    <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    IDN
                </a>
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', route('product.show',$product_slug->translate('en')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                    <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    ENG
                </a>
            @elseif (Route::currentRouteName() === 'solution.show')
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('id', route('solution.show',$solution_slug->translate('id')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    IDN
                </a>
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', route('solution.show',$solution_slug->translate('en')->slug), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    ENG
                </a>
            @elseif (Route::currentRouteName() === 'news.detail')
				<a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('id', route('news.detail', [ $categories['id'], $slugs['id'] ]), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    IDN
                </a>
				<a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', route('news.detail', [ $categories['en'], $slugs['en'] ]), [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    ENG
                </a>
            @else
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('id', null, [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/indonesian-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    IDN
                </a>
                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    <div class="flag-wrapper mr-2">
                        <img src="{{ '/imgs/british-flag.png' }}" alt="" class="img-fluid">
                    </div>
                    ENG
                </a>
            @endif
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link pr-2 pl-3" href="//cmd.cloudeka.id/" target="_blank">
            <i class="icon-account"></i>
          </a>
        </li>
        <li class="nav-item nav-item--search">
          <!-- form search -->
          <form action="/search" class="form-search">
            <div class="form-search__input">

                <input type="text" name="src" placeholder="Search here...">
            </div>
                <a class="nav-link pl-0 pb-0" href="#"> <i class="icon-search mr-0"></i></a>
          </form>
        </li>
      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
