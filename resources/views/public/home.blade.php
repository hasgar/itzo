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
		<div class="lp-menu-bar">
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
						  <h1>Find the best hospitals in india</h1>
						  <p class="lp-banner-browse-txt">Get information about the best hospital in a city, read reviews, locate and book your appointment</p>
						</div>
						<div class="col-md-10 col-xs-12 col-md-offset-1 col-sm-offset-0">
							<div class="lp-search-bar">
								<form method="get" action="/selectHealthcare">
									<div class="lp-search-bar-left">
									
									<div class="ui-widget border-dropdown">
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
										<input type="submit" value="Search" class="lp-search-btn" />
										<i class="icons8-search lp-search-icon"></i>
									</div>
									<div class="clearfix"></div> <!-- ../clearfix -->
									<input type="hidden" name="country" class="country-sel" value="101">
									<input type="hidden" name="state"  class="state-sel" value="1">
									<input type="hidden" name="city" class="city-sel" value="1">
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
						<!--<ul class="lp-home-categoires margin-top-subtract-55 padding-left-0">
							<li class="treatment-types">
								<img src="/images/types_of_treatments.png" />
							</li>
						</ul> -->
						
						<div class="col-md-4 no-padding">
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/unani" ><img src="/images/unani.png" class="h-types" /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/siddha" ><img src="/images/siddha.png" class="h-types" /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/psychology" ><img src="/images/psychology.png" class="h-types" /></a>
							</div>
						</div>
						<div class="col-md-4 no-padding">
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/homeopathy" > <img src="/images/homeopathy.png" class="h-types" /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/holistic" > <img src="/images/holistic.png" class="h-types" /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/allopathy" > <img src="/images/allopathy.png" class="h-types" /></a>
							</div>
						</div>
						<div class="col-md-4 no-padding">
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/acupuncture" > <img src="/images/accupuncture.png" class="h-types"  /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/ayurveda" > <img src="/images/ayurveda.png" class="h-types" /></a>
							</div>
							<div class="col-md-4 no-padding">
								<a href="/healthcare/type/chinese" ><img src="/images/chinese.png" class="h-types" /> </a>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div><!-- ../section-row -->

		<div class="lp-section-row ">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="lp-section-title-container text-center ">
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
											<img src="images/city/london.png" alt="london" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="listing.html">Healthcare Name</a>
											</h3>
											<label class="lp-listing-quantity">Mumbai</label>
										</div>
										<a href="listing.html" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/newcastle.png" alt="newcastle" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="listing.html">Healthcare Name</a>
											</h3>
											<label class="lp-listing-quantity">Benguluru</label>
										</div>
										<a href="listing.html" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/manchester.png" alt="manchester" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="listing.html">Healthcare Name</a>
											</h3>
											<label class="lp-listing-quantity">Cochin</label>
										</div>
										<a href="listing.html" class="overlay-link"></a>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="city-girds lp-border-radius-8">
										<div class="city-thumb">
											<img src="images/city/glasgow.png" alt="glasgow" />
										</div>
										<div class="city-title text-center">
											<h3 class="lp-h3">
												<a href="listing.html">Healthcare Name</a>
											</h3>
											<label class="lp-listing-quantity">New Delhi</label>
										</div>
										<a href="listing.html" class="overlay-link"></a>
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