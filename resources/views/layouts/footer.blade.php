<footer>
    <div class="container-fluid">
      <div class="row footer-wrapper">
        <div class="col-12 col-md-4 col-lg-2 col-xl-2 pb-5 pb-lg-0 ">
          <h5 style="text-transform: uppercase;">{{ __('title.headquarters') }}</h5>
          {!! $setting->company_address !!}
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-1 pb-5 pb-lg-0">
          <h5 style="text-transform: uppercase;">{{ __('title.why_us') }}</h5>
          <div class="d-flex">
            <ul class="pr-3">
              <li><a href="{{ route('why-us') }}"> {{ __('title.who_we_are') }}</a></li>
              <!-- <li><a href="/career">Career</a></li> -->
              <li><a href="{{ route('contact-us') }}"> {{ __('title.contact_us') }} </a></li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 pb-5 pb-lg-0">
          <h5 style="text-transform: uppercase;">{{ __('title.products') }}</h5>
          <div class="d-md-flex">

            <ul class="pr-md-5">
              @foreach ($header_products as $product)
              <li><a href="{{route('product.show',$product->translate($lang)->slug)}}">{{$product->translate($lang)->title}}</a></li>
              @endforeach
            </ul>
          </div>

        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 pb-5 pb-lg-0">
          <h5 style="text-transform: uppercase;">{{ __('title.solutions') }}</h5>
            <ul class="pr-3">
                @foreach ($header_solutions as $solution)
                <li><a href="{{ route('solution.show',$solution->translate($lang)->slug) }}">{{ $solution->translate($lang)->title }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 pb-5 pb-lg-0">
            <h5 style="text-transform: uppercase;">{{ __('title.pricing') }}</h5>
            <ul class="pr-3">
              <li><a href="{{ route('calculator') }}">{{ __('title.pricing_body') }}</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-1 p-lg-0">
            <h5 style="text-transform: uppercase;"><a href="{{ route('documentation') }}">{{ __('title.documentation') }}</a></h5>
            <ul class="pr-3">
              <!-- <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</a></li> -->
            </ul>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xl-1">
          <h5 style="text-transform: uppercase;">{{ __('title.contact') }}</h5>
            <ul class="pr-3">
              <!-- <li><a href="#">FAQ</a></li> -->
              <li><a href="//blog.lintasarta.net/" target="_blank">Blog</a></li>
              <li><a href="//cmd.cloudeka.id/" target="_blank">Portal</a></li>
            </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid py-3 bg-white mt-5">
      <div class="d-flex justify-content-between dark-color w-100">
        <span>{{$setting->system_copyright}}</span>
        <span>Imagined by LAB/ID.</span>
      </div>
    </div>
  </footer>
