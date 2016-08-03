@extends('public.layouts.master')

@section('title', 'Home - Chikitzo')


@section('content')
<div id="page">
<header class="lp-header-bg">
		<div class="lp-header-overlay"></div> <!-- ../header-overlay -->





		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								<ul>
									<li><a href="/">Home</a>
									</li>
									@if (Auth::guest())
									<li><a href="/signin">Sign In</a> / <a href="/signup">Sign Up</a></li>
									</li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard">Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@endif

								</ul>
							</div>
		<div class="lp-menu-bar">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo">
								<a href="index.html">
								<h2 class="main-logo"><i class="fa fa-heartbeat" aria-hidden="true"></i> Chikitzo</h2>
								</a>
							</div>
						</div>
						<div class="col-xs-6 mobile-nav-icon">
							<a href="index.html" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
						<div class="col-md-8 col-xs-12 lp-menu-container">
							<div class="pull-right lp-add-listing-btn">
								<ul>

									<li><a href="/add-health-care"><i class="fa fa-plus"></i> Add your health care service</a></li>
								</ul>
							</div>
							<div class="lp-menu pull-right menu">
							
								<ul>
									@if (Auth::guest())
									<li><a href="/signin"><i class="fa fa-user user-plus-icon"></i>  Login</a> / <a href="/signup"><i class="fa fa-user-plus user-plus-icon"></i>  Register</a></li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="lp-home-banner-contianer">
			<div class="lp-home-banner-contianer-inner">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center">
						  <h1>Find best hospitals in india</h1>
						  <p class="lp-banner-browse-txt">Get information about the best hospital in a city, read review, locate and book your appointment</p>
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
										<option value="0">Select your state</option>
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

					<div class="col-md-12">
						<ul class="lp-home-categoires margin-top-subtract-55 padding-left-0">
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
									<!-- Food icon by Icons8 -->
									<i class="fa fa-ambulance hospital-type-icon"></i><br>
										Hospital Type
									</span>
								</a>
							</li>
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
										<!-- Bar icon by Icons8 -->
										<i class="fa fa-wheelchair hospital-type-icon"></i><br>
										Hospital Type
									</span>
								</a>
							</li>
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
										<!-- Movie icon by Icons8 -->
										<i class="fa fa-stethoscope hospital-type-icon"></i><br>
										Hospital Type
									</span>
								</a>
							</li>
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
										<!-- Shopping Bag icon by Icons8 -->
										<i class="fa fa-heartbeat hospital-type-icon"></i><br>
										Hospital Type
									</span>
								</a>
							</li>
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
										<!-- Car icon by Icons8 -->
<!-- Car icon by Icons8 -->
<i class="fa fa-medkit hospital-type-icon"></i><br>
Hospital Type
									</span>
								</a>
							</li>
							<li>
								<a href="listing.html" class="lp-border-radius-5">
									<span>
									<!-- Cat Footprint icon by Icons8 -->
<i class="fa fa-h-square hospital-type-icon"></i><br>
Hospital Type
									</span>
								</a>
							</li>
						</ul>
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