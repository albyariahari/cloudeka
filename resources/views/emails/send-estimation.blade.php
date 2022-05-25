<!doctype html>
<html lang="en">
	<head>
		<title>Email</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
        <!-- Banner -->
		<section class="documentation-banner mail__banner" style="box-sizing: border-box; font-family: Arial,Helvetica,sans-serif; margin-left: auto; margin-right: auto; position:relative; width: 600px;">
			<div class="container-fluid px-0">
				<div class="banner-title" style="background: url('{{ cloudekaBucketLocalUrl($banner) }}'); background-position: center; background-size: cover; height: auto; width: 600px;">
					<div class="text" style="color: #FFF; margin: 0px; padding-bottom: 32px; padding-top: 32px; text-align: center; width: 600px;">
						<h2 class="light-color" style="font-size: 28px; margin: 0px; width: auto;">Thank you for your order</h2>
					</div>
				</div>
			</div>
		</section>

        <section class="mail__body" style="box-sizing: border-box; font-family: Arial,Helvetica,sans-serif; line-height: 25.6px; margin-left: auto; margin-right: auto; padding-right: 40px; padding-top: 40px; width: 600px;">
            <div class="container-fluid" style="margin-left: auto; margin-right: auto; padding-left: 30px;">
                <div class="description dark-color" style="color: #526271;font-size: 1rem;">
				@foreach ($body as $val)
					{!! $val !!}

					@if (!$loop->last)
                    <p>
                        Name: {{ $otherRequest->name }}<br>
                        Email: {{ $otherRequest->email }}<br>
                        Phone: {{ $otherRequest->phone }}<br>
                        Company: {{ $otherRequest->company }}<br>
                    </p>
					@endif
				@endforeach

                    <table style="width: 100%;" cellspacing=0>
                        @foreach($carts['cart'] as $key => $value)
                            @if($key > 0)
                                <tr><td colspan=2 style="height:30px"> </td></tr>
                            @endif
                            <tr><td colspan=2 style="background: #e6e6e6;"><b>{{ ucwords(str_replace('-', ' ', $value['product_name'])) }}</b></td></tr>
                            @foreach($value['component'] as $keyC => $val)
                                @if(!in_array($keyC, $excludedComponent) && (!empty($val['slug']) && !in_array($val['slug'], $excludedComponent)) && $val['visible'])
                                    <tr style="font-size: 14px;">

                                    @if($val['data_type'] === 'server_name' || $val['data_type'] ==  'server_quantity')
                                        <td style="color: #184C98; padding-top: 5px; padding-bottom: 5px;"><b>{{ $val['name'].': ' }}</b> {{ $val['value'].' '.$val['unit'] }}</td>
                                        <td style="text-align: right;"> </td>
                                    @elseif($val['data_type'] === 'list-with-child')
                                        <td style="color: #184C98; padding-top: 5px; padding-bottom: 5px;"><b>{{ $val['name'].': ' }}</b> {{ $val['list_items'][$val['value']]['name'] }} </td>
                                        <td style="text-align: right;"> </td>
                                    @elseif($val['data_type'] === 'list-full' )
                                        <td style="color: #184C98; padding-top: 5px; padding-bottom: 5px;"><b>{{ $val['name'].': ' }}</b> {{ $val['list_items'][$val['value']]['name'] }} </td>
                                        <td style="text-align: right;"> Rp. {{ number_format($val['subtotal'], 2, ',', '.') }}</td>
                                    @else
                                        <td style="color: #184C98; padding-top: 5px; padding-bottom: 5px;"><b>{{ $val['name'].': ' }}</b> {{ $val['value'].' '.$val['unit'] }}</td>
                                        <td style="text-align: right;"> Rp. {{ number_format($val['subtotal'], 2, ',', '.') }}</td>
                                    @endif
                                    </tr>
                                @endif
                            @endforeach
                            <tr style="font-size: 16px;">
                                <td style="border-top:1px solid #cbcbcb; border-bottom:1px solid #cbcbcb; padding-top:5px; padding-bottom: 5px;"><b>Estimate Cost</b></td>
                                <td style="border-top:1px solid #cbcbcb; border-bottom:1px solid #cbcbcb; padding-top:5px; padding-bottom: 5px;text-align:right"> Rp. {{ number_format($value['component'][$value['component']['quantityName']]['value'] * $value['component'][$value['component']['quantityName']]['subtotal'], 2, ',', '.') }} </td>
                            </tr>
                        @endforeach

                        @foreach ($promos as $key => $promo)
                            @if(in_array($promo->product->slug, $productInCart))
                                <tr>
                                    <td colspan="2">
                                        <div id="promo-area" style="padding: 0px 0px; margin-top:20px">
                                            <div class="promo-item" style="margin-bottom: 20px;position: relative;">
                                                <div class="promo-wrapper">
                                                    <div class="promo-title"
                                                        style="background-image: url('{{ cloudekaBucketLocalUrl('imgs/icon_verified.png') }}');
                                                            background-color: #D0AF25;
                                                            padding: 20px 30px;
                                                            background-repeat: no-repeat;
                                                            background-position: center right 30px;">

                                                        <h3 style="font-size: 17px;
                                                            color: white;
                                                            width: 75%;">
                                                            {{ $promo->title }}
                                                        </h3>
                                                    </div>
                                                    <div class="promo-excerpt"
                                                        style="background-color: #C4A10F;
                                                        font-size: 14px;
                                                        color: white;
                                                        padding: 20px 30px;
                                                        border-bottom-right-radius: 20px;
                                                        font-weight: 500;
                                                        line-height: 20px;">
                                                        {{ $promo->excerpt }}
                                                    </div>
                                                    <div style="background-image: url(' {{ cloudekaBucketLocalUrl('imgs/ellipse.png') }}');
                                                        background-repeat-x: no-repeat;
                                                        background-position-x: -5px;
                                                        position: absolute;
                                                        top: 0px;
                                                        left: 0px;
                                                        width: 100%;
                                                        height: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        <tr style="font-size: 16px;">
                            <td style="padding-top:30px;"><b>Total Estimation Cost</b></td>
                            <td style="padding-top:30px;text-align:right"> Rp. {{ number_format($carts['total'], 2, ',', '.') }} </td>
                        </tr>
                    </table>
                </div>
                <br>
                <div style="color: #526271; font-size: 0.8rem;">
					{!! $disclaimer !!}
                </div>
            </div>
        </section>

        <section class="mail__contact" style="box-sizing: border-box; font-family: Arial,Helvetica,sans-serif; line-height: 25.6px; margin-left: auto; margin-right: auto; width: 600px;">
            <div class="container-fluid">
                <div class="row wrapper" style="
                    position: relative;
                    background-color: #184C98;
                    border-radius: 14px;
                    padding: 20px 25px;
                    float: left;
                    width: 100%;
                    margin-top: 20px;
                    box-sizing: border-box;
                ">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%;border-right: 1px solid white;">
                                <div class="col-6 mail__contact__left" style="color: #FFF;">
                                    <h2 class="font-size-20" style="font-size: 18px; margin: 0px;">Head Office</h2>
                                    <div class="address-wrapper" style="margin-bottom: 10px; margin-top: 10px;">
                                        <h3 class="font-size-16" style="font-size: 15px; font-weight: 700; margin: 0px;">Central Jakarta</h3>
                                        <div class="address font-size-16" style="font-size: 14px; line-height: 23px;">
                                            Menara Thamrin, 12th Floor<br>
                                            Jl.M.H Thamrin Kav.3<br>
                                            Jakarta, 10250
                                        </div>
                                    </div>
                                    <div class="contact-wrapper font-size-16 txt-bold" style="font-size: 14px; font-weight: 700; line-height: 18px;">
                                        T: 14052<br>
                                        F: +6221 230 3567<br>
                                        info@lintasarta.co.id
                                    </div>
                                </div>
                            </td>
                            <td style="width: 50%;text-align: right;">
                                <div class="col-6 mail__contact__right">
                                    <nav class="nav flex-column" style="font-weight: 700;">
                                        <a class="nav-link font-size-16" href="/contact-us" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Contact Us</a>
                                        <a class="nav-link font-size-16" href="/" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Website</a>
                                        <a class="nav-link font-size-16" href="https://blog.lintasarta.net/" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Blog</a>
                                        <a class="nav-link font-size-16" href="https://cmd.cloudeka.id/" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Portal</a>
                                    </nav>
                                    <div class="socmed__wrapper" style="float: right; margin-top: 10px;">
                                        <a href="mailto:info@lintasarta.co.id" class="socmed--link" target="_blank" style="
                                            background: url('{{ '/imgs/mail.jpg' }}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            width: 29px;
                                            height: 29px;
                                            text-decoration: none;
                                            display: inline;
                                            border-radius: 100%;
                                            text-align: center;
                                            float: left;
                                            color: #184C98;
                                            margin-right: 5px;
                                        ">
                                        </a>
                                        <a href="{{ $socMed['li'] }}" class="socmed--link" target="_blank" style="
                                            background: url('{{ '/imgs/linkedin.jpg' }}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            width: 29px;
                                            height: 29px;
                                            text-decoration: none;
                                            display: inline;
                                            border-radius: 100%;
                                            text-align: center;
                                            float: left;
                                            color: #184C98;
                                            margin-right: 5px;
                                        ">
                                        </a>
                                        <a href="{{ $socMed['tw'] }}" class="socmed--link" target="_blank" style="
                                            background: url('{{ '/imgs/twitter.jpg' }}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            width: 29px;
                                            height: 29px;
                                            text-decoration: none;
                                            display: inline;
                                            border-radius: 100%;
                                            text-align: center;
                                            float: left;
                                            color: #184C98;
                                            margin-right: 5px;
                                        ">
                                        </a>
                                        <a href="{{ $socMed['fb'] }}" class="socmed--link" target="_blank" style="
                                            background: url('{{ '/imgs/facebook.jpg' }}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            width: 29px;
                                            height: 29px;
                                            text-decoration: none;
                                            display: inline;
                                            border-radius: 100%;
                                            text-align: center;
                                            float: left;
                                            color: #184C98;
                                            margin-right: 5px;
                                        ">
                                        </a>
                                        <a href="{{ $socMed['ig'] }}" class="socmed--link" target="_blank" style="
                                            background: url('{{ '/imgs/instagram.jpg' }}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            width: 29px;
                                            height: 29px;
                                            text-decoration: none;
                                            display: inline;
                                            border-radius: 100%;
                                            text-align: center;
                                            float: left;
                                            color: #184C98;
                                        ">
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
			</div>
        </section>
	</body>
</html>
