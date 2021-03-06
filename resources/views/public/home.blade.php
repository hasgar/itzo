@extends('public.layouts.master')

@section('title', 'Home - Chikitzo')


@section('content')
<div id="page">
<header class="lp-header-bg">
		<div class="lp-header-overlay"></div> <!-- ../header-overlay -->





		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								@include('public.layouts.headerMob')
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						@include('public.layouts.logo')

					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="lp-home-banner-contianer">
			<div class="lp-home-banner-contianer-inner">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center">
						  <h1  style="color: #00818e;">Find the best Health care in India</h1>
						  <p class="lp-banner-browse-txt" style="color: #00818e;">Get information about the best health care in a city, read reviews, locate and book your appointment</p>
						</div>
						<div class="col-md-8 col-xs-8 col-md-offset-2 col-sm-offset-2">
							<div class="lp-search-bar">
								<form method="get" action="/selectHealthcare">
									<div class="lp-search-bar-left">

									<!--<div class="ui-widget border-dropdown">
									  <select class="comboboxs your-state">
										<option value="">Select one...</option>
										@foreach ($states as $state)
										<option value="{{$state['id']}}">{{$state['name']}}</option>
										@endforeach
									</select>
									</div>
									<div class="ui-widget border-dropdown">
									  <select class="comboboxs your-city">
										<option value="">Select one...</option>
										<option value="0">Select your city</option>
									  </select>
									</div>

								-->
								<input type="hidden" class="your-state" value="19" name="your-state" />
								<div class="ui-widget border-dropdown">
									<select class="comboboxs your-city" name="city">
									<option value="1947">Kozhikode</option>
									</select>
								</div>

									<div class="ui-widget border-dropdown">
									  <select class="comboboxs you-lookingfor">
										<option value="">Select one...</option>
										@foreach ($types as $type)
										<option value="{{$type['id']}}">{{$type['name']}}</option>
										@endforeach
									  </select>
									</div>
											</div>
									<div class="lp-search-bar-right">
										<button type="submit" class="lp-search-btn" style=" width: 60px;">
<i class="icons8-search lp-search-icon"></i>
</button>

									<div class="clearfix"></div> <!-- ../clearfix -->
									<input type="hidden" name="country" class="country-sel" value="101">
									<input type="hidden" name="state"  class="state-sel" value="19">
									<!--<input type="hidden" name="city" class="city-sel" value="1">-->
									<input type="hidden" name="type" class="type-sel" value="1">

								</form>
							</div> <!-- ../search-bar -->

						</div>
					</div>
				</div>
			</div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>
		<div class="lp-section-row">
			<div class="container">
				<div class="row">

					<div class="col-md-12 lp-home-categoires margin-top-subtract-55 padding-left-0" align="center">

<div class="col-md-4 no-padding">
						<div class="col-md-4 no-padding">
							<a href="/healthcare/type/allopathy" > <img src="/images/allopathy_1.png" class="h-types" /></a> <br>
							<h5 class="heading-item">Allopathy</h5>
						</div>

						<div class="col-md-4 no-padding">
							<a href="/healthcare/type/ayurveda" > <img src="/images/ayurveda_1.png" class="h-types" /></a>
							<h5 class="heading-item">Ayurveda</h5>
						</div>


						<div class="col-md-4 no-padding">
							<a href="/healthcare/type/holistic" > <img src="/images/holistic_1.png" class="h-types" /></a>
							<h5 class="heading-item">Yoga & Naturopathy</h5>
						</div>
</div>
<div class="col-md-4 no-padding">
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/unani" ><img src="/images/unani_1.png" class="h-types" /></a>
								<h5 class="heading-item">Unani</h5>
							</div>


							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/siddha" ><img src="/images/siddha_1.png" class="h-types" /></a>
								<h5 class="heading-item">Siddha</h5>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/homeopathy" > <img src="/images/homeopathy_1.png" class="h-types" /></a>
								<h5 class="heading-item">Homeopathy</h5>
							</div>
</div>
							<div class="col-md-4 no-padding">
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/acupuncture" > <img src="/images/accupuncture_1.png" class="h-types"  /></a>
								<h5 class="heading-item">Acupuncture & Chinese</h5>
							</div>

							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/psychology" ><img src="/images/psychology_1.png" class="h-types" /></a>
								<h5 class="heading-item">Psychology</h5>
							</div>

							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/chinese" ><img src="/images/chinese_1.png" class="h-types" /> </a>
								<h5 class="heading-item">Other alternative medicine & therapy</h5>
							</div></div>



					</div>
				</div>
			</div>
		</div><!-- ../section-row -->

		<div class="lp-section-row ">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<!--<div class="lp-section-title-container text-center ">
							<h1>Let's explore</h1>
							<div class="lp-sub-title">the best health care service for you.</div>
							<div class="text-center banner-arrow-dark">

								<img src="images/banner/banner-arrow-dark.png" alt="banner-arrow" class="banner-arrow" />
							</div>
						</div><!-- ../section-title-->
						<div class="lp-section-content-container">
							<div class="row">
								<div class="col-md-6 col-sm-6  col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/AYURVEDA-NILAYAM-NURSING-HOME-AND-RESEARCH-CENTER.png" alt="AYURVEDA NILAYAM NURSING HOME AND RESEARCH CENTER" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="http://www.chikitzo.com/healthcare/299/AYURVEDA+NILAYAM+NURSING+HOME+AND+RESEARCH+CENTER">AYURVEDA NILAYAM </a>
											</h3>
											<label class="lp-listing-quantity">NURSING HOME AND RESEARCH CENTER</label>
										</div>
										<a href="http://www.chikitzo.com/healthcare/299/AYURVEDA+NILAYAM+NURSING+HOME+AND+RESEARCH+CENTER" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/newcastle.png" alt="newcastle" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="/contact">Advertise here</a>
											</h3>
											<label class="lp-listing-quantity">Contact us</label>
										</div>
										<a href="/contact" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/manchester.png" alt="manchester" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="/contact">Advertise here</a>
											</h3>
											<label class="lp-listing-quantity">Contact us</label>
										</div>
										<a href="/contact" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/glasgow.png" alt="glasgow" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="/contact">Advertise here</a>
											</h3>
											<label class="lp-listing-quantity">Contact us</label>
										</div>
										<a href="/contact" class="overlay-link"></a>
									</div>
								</div>
							</div>
						</div><!-- ../section-content-container-->
					</div>
				</div>
			</div>
		</div><!-- ../section-row -->

	</section>

@endsection
