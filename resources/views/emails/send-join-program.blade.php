<!doctype html>
<html lang="en">
	<head>
		<title>Email</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            a[x-apple-data-detectors] {
                color: white !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
            
            u + .mail__contact a {
                color: white !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
            
            .mail__contact a {
                color: white !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
        </style>
	</head>
	<body>
        <!-- Banner -->
		<section class="documentation-banner mail__banner" style="box-sizing: border-box; font-family: Arial,Helvetica,sans-serif; margin-left: auto; margin-right: auto; position:relative; width: 600px;">
			<div class="container-fluid px-0">
				<div class="banner-title" style="background: url('{{ cloudekaBucketLocalUrl($data['banner']) }}'); background-position: center; background-size: cover; height: auto; width: 600px;">
					<div class="text" style="color: #FFF; margin: 0px; padding-bottom: 32px; padding-top: 32px; text-align: center; width: 600px;">
						<h2 class="light-color" style="font-size: 28px; margin: 0px; width: auto;">
							Thank you for joining
						</h2>
					</div>
				</div>
			</div>
		</section>
		<!-- /Banner -->
		
        <section class="mail__body" style="box-sizing: border-box; font-family: Arial,Helvetica,sans-serif; line-height: 25.6px; margin-left: auto; margin-right: auto; padding-right: 40px; padding-top: 40px; width: 600px;">
            <div class="container-fluid" style="margin-left: auto; margin-right: auto; padding-left: 30px;">
                <div class="logo" style="width: 100%;margin-bottom:30px">
                    <img src="{{ $message->embed(public_path().'/imgs/logo.png') }}" style="max-width:150px; display:block;" data-auto-embed="attachment"/>
                </div>
                <div class="description dark-color" style="color: #526271;font-size: 1rem;">
				@foreach ($data['body'] as $val)
					{!! $val !!}
					
					@if (!$loop->last)
                        {!! $data['data']['fullname'] !!}
					@endif
				@endforeach
                </div>
                <br />
                <div style="color: #526271; font-size: 0.8rem;">
					{!! $data['disclaimer'] !!}
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
                                        <a href="mailto:info@lintasarta.co.id" style="color:white">info@lintasarta.co.id</a>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 50%;text-align: right;">
                                <div class="col-6 mail__contact__right">
                                    <nav class="nav flex-column" style="font-weight: 700;">
                                        <a class="nav-link font-size-16" href="https://cloudeka.id/contact-us" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Contact Us</a>
                                        <a class="nav-link font-size-16" href="https://cloudeka.id/" style="color: white; display: block; margin-bottom: 5px; text-decoration: none;">Website</a>
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
                                        <a href="{{ $data['socMed']['li'] }}" class="socmed--link" target="_blank" style="
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
                                        <a href="{{ $data['socMed']['tw'] }}" class="socmed--link" target="_blank" style="
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
                                        <a href="{{ $data['socMed']['fb'] }}" class="socmed--link" target="_blank" style="
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
                                        <a href="{{ $data['socMed']['ig'] }}" class="socmed--link" target="_blank" style="
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