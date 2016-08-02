@extends('public.layouts.master')

@section('title', 'Sign In - Chikitzo')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">
		<div class="lp-topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8 text-left">
						<ul class="lp-topbar-menu margin-top-6">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">About</a>
							</li>
							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-4 text-right">
						<div class="lp-join-now after-login lp-join-user-info">
							<ul>
								<li>
									<span>
										<img src="/images/user-thumb-94x94.png" alt="user">
									</span>
									<a href="author.html#"> Russel Jhon</a>
									<ul class="lp-user-menu list-style-none">
										<li><a href="author.html#dashborad">Dashboard </a></li>
										<li><a href="author.html#mylistings">My Listings</a></li>
										<li><a href="author.html#expiredlistings">Expired Listings </a></li>
										<li><a href="author.html#updateprofile">Update Profile</a></li>
										<li><a href="login.html">Sign out </a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- ../topbar -->
		
		<!-- Login Popup -->
		<div class="md-modal md-effect-3" id="modal-3">
			<div class="login-form-popup lp-border-radius-8">
				<div class="siginincontainer">
					<h1 class="text-center">Sign in</h1>
					<form class="form-horizontal margin-top-30" method="post">
						<div class="form-group">
							<label for="username">Username or Email Address *</label>
							<input type="text" class="form-control" id="username">
						</div>
						<div class="form-group">
							<label for="password">Password *</label>
							<input type="password" class="form-control" id="password">
						</div>
						<div class="form-group">
							<div class="checkbox pad-bottom-10">
								<input id="check1" type="checkbox" name="price-on-call" value="price-on-call">
								<label for="check1">Keep me signed in</label>
							</div>
						</div>
						
						<div class="form-group">
							<input type="submit" value="Sign in" class="lp-secondary-btn width-full btn-first-hover"> 
						</div>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a class="signUpClick">Not a member? Sign up</a>
							<a class="forgetPasswordClick pull-right">Forgot Password</a>
						</div>
						<p class="margin-top-15">Connect with your Social Network</p>
						<ul class="social-login list-style-none">
							<li><button id="logingoogle" class="google flaticon-googleplus"><i class="fa fa-google-plus"></i><span>Google</span></button></li>
							<li><button id="loginfacebook" class="facebook flaticon-facebook"><i class="fa fa-facebook"></i><span>Facebook</span></button></li>
							<li><button id="logintwitter" class="twitter flaticon-twitter"><i class="fa fa-twitter"></i><span>Twitter</span></button></li>
						</ul>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
				<div class="siginupcontainer">
					<h1 class="text-center">Sign Up</h1>
					<form class="form-horizontal margin-top-30" method="post">
						<div class="form-group">
							<label for="username">Username *</label>
							<input type="text" class="form-control" id="username2">
						</div>
						<div class="form-group">
							<label for="password">Email Address *</label>
							<input type="email" class="form-control" id="password2">
						</div>
						<div class="form-group">
							<p>A password will be e-mailed to you.</p>
						</div>
						<div class="form-group">
							<input type="submit" value="Register" class="lp-secondary-btn width-full btn-first-hover"> 
						</div>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a class="signInClick">Already have an account? Sign in</a>
							<a class="forgetPasswordClick pull-right">Forgot Password</a>
						</div>
						<p class="margin-top-15">Connect with your Social Network</p>
						<ul class="social-login list-style-none">
							<li><button id="logingoogle2" class="google flaticon-googleplus"><i class="fa fa-google-plus"></i><span>Google</span></button></li>
							<li><button id="loginfacebook2" class="facebook flaticon-facebook"><i class="fa fa-facebook"></i><span>Facebook</span></button></li>
							<li><button id="logintwitter2" class="twitter flaticon-twitter"><i class="fa fa-twitter"></i><span>Twitter</span></button></li>
						</ul>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
				<div class="forgetpasswordcontainer">
					<h1 class="text-center">Forgotten Password</h1>
					<form class="form-horizontal margin-top-30" method="post">
						<div class="form-group">
							<label for="password">Email Address *</label>
							<input type="email" class="form-control" id="email2">
						</div>
						<div class="form-group">
							<input type="submit" value="Get New Password" class="lp-secondary-btn width-full btn-first-hover"> 
						</div>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a class="cancelClick">Cancel</a>
						</div>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
			</div>	
		</div>
		<!-- ../Login Popup -->
		
		<!-- Popup Open -->
		<div class="md-modal md-effect-3" id="modal-2">
			<div class="container">
				<div class="md-content ">
					<div class="row popup-inner-left-padding ">
						<div class="col-md-6 lp-insert-data">
						</div>
						<div class="col-md-6">
							<div id="quickmap" class="quickmap"></div>
							<a class="md-close widget-map-click"><i class="fa fa-close"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Popup Close -->
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo">
								<a href="index.html">
									<img src="/images/logo.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-xs-6 mobile-nav-icon">
							<a href="author.html#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
							
						<div class="col-md-8 col-xs-12 lp-menu-container">
							<div class="pull-right lp-add-listing-btn">
								<ul>
									<li><a href="post-submit.html" style="line-height: 80px;"><i class="fa fa-plus"></i> Add Listing</a></li>
								</ul>
							</div>
							<div class="lp-menu pull-right menu">
								<ul>
									<li><a href="author.html#" style="line-height: 80px;">Categories <i class="icons8-angle-down drop-down-icon"></i></a>
										<ul class="sub-menu">
											<li class="has-menu"><a href="listing.html">Food </a>
												<ul class="sub-menu">
													<li><a href="listing.html">Restaurents </a></li>
													<li><a href="listing.html">Cafe </a></li>
													<li><a href="listing.html">Bars</a></li>
												</ul>
											</li>
											<li><a href="listing.html">Beauty &amp; Spas </a></li>
											<li><a href="listing.html">Real Estate </a></li>
											<li><a href="listing.html">Automotive </a></li>
										</ul>
									</li>
									<li><a href="author.html#" style="line-height: 80px;">Pages <i class="icons8-angle-down drop-down-icon"></i></a>
										<ul class="sub-menu">
											<li><a href="listing.html">Listing </a></li>
											<li><a href="listing-sidebar.html">Listing - Sidebar </a></li>
											<li><a href="listing-map.html">Listing - Map </a></li>
											<li><a href="author.html">Author </a></li>
											<li><a href="post-detail.html">Post Detail </a></li>
											<li><a href="post-submit.html">Post Submit </a></li>
											<li><a href="login.html">Join Us</a></li><li><a href="index-1.html">Home 2</a></li>
										</ul>
									</li>
									<li><a href="author.html#" style="line-height: 80px;">Blog <i class="icons8-angle-down drop-down-icon"></i></a>
										<ul class="sub-menu">
											<li><a href="blog-archive.html">Blog </a></li>
											<li><a href="blog-detail.html">Blog Detail </a></li>
										</ul>
									</li>
									<li>
										<a href="author.html#" style="line-height: 80px;">Elements <i class="icons8-angle-down drop-down-icon"></i></a>
											<ul class="sub-menu">
											<li><a href="pricing.html">Pricing </a></li>
											<li><a href="404.html">404 Page </a></li>
											<li><a href="testimonials.html">Testimonials </a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="page-heading listing-page">
			<div class="page-heading-inner-container text-center">
				<h1>My Account</h1>
				<ul class="breadcrumbs">
					<li><a href="index.html">Home</a></li>
					<li><span>My Account</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->
	
	<!--==================================Section Open=================================-->
	<section class="aliceblue">
			<div class="dashboard-tabs">
				
			</div>
			<div class="container">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade active in" id="dashborad">
						<div class="dashboard-tab">
							
							
							<div class="user-recent-listings-container">
								<h3 class="padding-top-35 padding-bottom-35">My Listings</h3>
								<div class="user-recent-listings-inner">
									<div class="row lp-list-page-list">
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">
														<img src="/images/listview/post287x191-1.jpg" alt="list-1">
													</div>
													<ul class="lp-list-view-edit list-style-none aliceblue">
														<li><a href="author.html#"><i class="fa fa-pencil-square-o"></i><span>Edit</span></a></li>
														<li><a href="author.html#"><i class="fa fa-times-circle"></i><span>Remove</span></a></li>
													</ul>
												</div>
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
														<h4>The Dorchester grill</h4>
														<ul class="lp-grid-box-price">
															<li class="category-cion"><a href="listing.html">
																<!-- Home icon by Icons8 -->
															<img class="icon icons8-Food" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADaklEQVRoQ+1aQVbbMBD9013YlJ6gUS9AOAHKCZoscRZNT0B6AuAENSdoukhYAiewOQHhAlU4QWEDu07fKLZxDI4jm5S2T14ltjTSn5k/kr5NemKuiNDBK1wMnMeB6ueHlvnI/3igdl3uU3dq+BUwZENGgaL8+Ol8XO9nQIodNw2u7oTLAHogTSPmI1LCKZ9aPrUSD3iOeI40JUNJf59aPrV8aq32wAqOzKRnFKilo0V3asru2937X7eyuyZA6hAPxNVzxfZlqeVq9zEikx9zEL1ngor31dzVUJ32+tS0iWHAfBMNPrTr2Ej75FMrBrDHhG68r+T3xi99ajQxIgCXUaB03QFzdq5JT01IwAEzjuOBOqpr1KWfnpgjIhwycBIHauTSd0mQmJqIAC1zFyA9As6aesdlMqlyw0A/DtS5S9+0rZ6YIRG+AXzHLWqTPjPb9MBzgN7+CZ5k/EgmEPfVrQuQ7tTsMTAioGdBEPWEElaKyYX6exyooYth17Z6asYEfHJNZZ2kUTYe8w2DevFA2YVyAcRWEZ4lUdkY6R/JaT3ZcamSaXVixgVE2Buocd6JmTimp0bC9ZWBOVrYdQ15VWQkhfGAKwLaDHyJAxVW9ck/r1p3iirfohQzZthC96XAWBD3iBJptlbJdQKyID4EzA4DMVroNwVTAHHNLeg6Np2AWL4sg5mD0U8J5ZIKSRHpgHAm6QSgNgix5QwkBYN7jInwUf4zY4w3OF6XnFI88AuHRLAV0BJ0C8M6kShuRco06iWOFD2+WHQ4lGqWTEhKnYC6KIJKJi/AZaFKzhJ8x0yjYoVxjWztiCxtAxZEHRF4KJvLBNBtPFDvltpNzE8ibNt7ixo/xhbCJlGoXbWqPKUnpkME+yKmTN5nxm5dTq0avxZH6hisGqjKSVXPq+yv5Mhzxl31qKoJrvvcAynzlI/IujlU0s6nlk+tgsjcMKOy7j61/uvUym1RrktE5p1/YouSCQfP6FGZPgZsRMB4MY7oiTkgQphIME+EgyUBgyFb95OXInqjbXxyUpRUkVOeCBNWo2XG57LzxaNoBlgRgxESYRYF6rIpKOeIlH6/JWcMolGVMmiVS+YwPbvkAYioUfwOa12AzkCSN0M7yQCX1rOLD8ScpE0BBEDkWInkXmLvSZFwAPLsG6u0/288R19KOGbU8gAAAABJRU5ErkJggg==" alt="restaurents">
															</a></li>
															<li><span>$50,000</span></li>
														</ul>
													</div>
													<div class="lp-list-view-content-bottom">
														<ul class="list-style-none list-pt-display">
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	03 Feb 2015
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-clock-o"></i>
																</span>
																<span class="lp-list-sp-text">
																	07 Days Left
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-check"></i>
																</span>
																<span class="lp-list-sp-text">
																	Published
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-fire"></i>
																</span>
																<span class="lp-list-sp-text">
																	Hot Lisiting
																</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Pricing Plan</h4>
														<div>
															<p class="lp-list-view-paypal-tit">Free</p>
															<p>Upgrade your Pricing Plan</p>
														</div>
														<div class="lp-list-view-select">
															<div class="ui-widget border-dropdown">
															  <select class="comboboxs" style="display: none;">
																<option value="">Select one...</option>
																<option value="Free" selected="">Free</option>
																<option value="$25 - 30 Days">$25 - 30 Days</option>
																<option value="$40 - 30 Days">$40 - 30 Days</option>
															  </select><span class="custom-combobox"><input title="" class="custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left lp-search-input location_input lp-home-locaton-input ui-autocomplete-input" autocomplete="off"><a tabindex="-1" title="Show All Items" class="ui-button ui-widget ui-state-default ui-button-icon-only custom-combobox-toggle ui-corner-right" role="button"><span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-text"></span></a></span>
															</div>
														</div>
														<div class="lp-list-pay-btn">
															<a href="author.html#">
																<i class="fa fa-paypal"></i>
																<span>Via Paypal</span>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">
														<img src="/images/listview/post287x191-2.jpg" alt="list-1">
													</div>
													<ul class="lp-list-view-edit list-style-none aliceblue">
														<li><a href="author.html#"><i class="fa fa-pencil-square-o"></i><span>Edit</span></a></li>
														<li><a href="author.html#"><i class="fa fa-times-circle"></i><span>Remove</span></a></li>
													</ul>
												</div>
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
														<h4>5th Generation Laptop</h4>
														<ul class="lp-grid-box-price">
															<li class="category-cion"><a href="listing.html">
																<!-- Home icon by Icons8 -->
																<img class="icon icons8-Food" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABYUlEQVRoQ+1Y0VGDQBTcTQNqBYoVxA6wAv01aUIr0SbUX60glJAKgqnA0IDrQEYnAnKTOcgdmccv947dt3vvmCVG/nDk+GEEQitoCkSpQPqaX0B4hJCSOA0JUsIGRAbiIbtLPupYGhYqwVPIQ4Ju+3ZFZIKrOokmgef8jcRNbARKPBLes3lyu4utjcBnaNv817xShWyenHUSuH7JtbtgMUuCTioXngY4V8GhreXCYwSGVsQUsEPs6TGzkFnILNT9Z2AXmadDnOU2hWwKOU3SvcAsZBYyC+19ka02AE88GzdQuYrF7PJPTnWEsUqkwRagQuTUGWyV2lfR4heeSKXh7aRCYoYJ7lujxfpFMZB5B9uWR0Ag5qnjEE5aM404zHX5rgx7uY3TtQx/WF1w6++3U6m6B36nDjQFeb7vVgddL60FLn+mUtDkuQ/iRqCPLvrsYQr4dK+PWlOgjy767DF6Bb4BAAIIyCXX8RcAAAAASUVORK5CYII=" alt="restaurents">
															</a></li>
															<li><span>$200.00</span></li>
														</ul>
													</div>
													<div class="lp-list-view-content-bottom">
														<ul class="list-style-none list-pt-display">
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	03 Feb 2015
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-clock-o"></i>
																</span>
																<span class="lp-list-sp-text">
																	30 Days Left
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-check"></i>
																</span>
																<span class="lp-list-sp-text">
																	Published
																</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Pricing Plan</h4>
														<div>
															<p class="lp-list-view-paypal-tit">$40 - <span> for 30 days</span></p>
															<p>Upgrade your Pricing Plan</p>
														</div>
														<div class="lp-list-view-select">
															<div class="ui-widget border-dropdown">
															  <select class="comboboxs" style="display: none;">
																<option value="">Select one...</option>
																<option value="Free">Free</option>
																<option value="$25 - 30 Days">$25 - 30 Days</option>
																<option value="$40 - 30 Days" selected="">$40 - 30 Days</option>
															  </select><span class="custom-combobox"><input title="" class="custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left lp-search-input location_input lp-home-locaton-input ui-autocomplete-input" autocomplete="off"><a tabindex="-1" title="Show All Items" class="ui-button ui-widget ui-state-default ui-button-icon-only custom-combobox-toggle ui-corner-right" role="button"><span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-text"></span></a></span>
															</div>
														</div>
														<div class="lp-list-pay-btn">
															<a href="author.html#">
																<i class="fa fa-paypal"></i>
																<span>Via Paypal</span>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">
														<img src="/images/listview/post287x191-3.jpg" alt="list-1">
													</div>
													<ul class="lp-list-view-edit list-style-none aliceblue">
														<li><a href="author.html#"><i class="fa fa-pencil-square-o"></i><span>Edit</span></a></li>
														<li><a href="author.html#"><i class="fa fa-times-circle"></i><span>Remove</span></a></li>
													</ul>
												</div>
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
														<h4>Buy now 10 shots </h4>
														<ul class="lp-grid-box-price">
															<li class="category-cion"><a href="listing.html">
																<!-- Home icon by Icons8 -->
															<img class="icon icons8-Camera" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEXUlEQVRoQ+1ZTVrbSBB9xWrMJswJQs8FhpwgrRPELCMvQk4QcwIyJ4g5AWRhZYlyAjcnIFxgmpxgzCbJipqv2mohbP20bIn444MlVv+8rupXr14TnsgfPREceAaybZHsJSL6wu7hFz7gDkMiHLQBzYxv2EGKP3BqDtU8dGznQByIH5i1BbC8YQdoF1EomO6BJHZCwAeAb5loaN4qE3qq8p3+YjUxpwC9YODUxGocMr4UiE7sjABdNQEDqYnV4fLv+ovdJ4aV/zPjlRmpbyGbWJlnag+IcOXmISjzVt00zVMKJEosNw2cxWplrJ7aj0Q4YeCzidVR0xx1v+vEnhPwjhn/mJH62DTX6mYS+46AcxlYttkQkAwcmlilTYs3ABkScFF6d0rIIAeip/YAhAsC9rPB17NYrTBOlFjJ+dc1mygdtw6oKLGSmn+XjWXGHIT3/sAcEAcCjmn2mPEVhPNNT3SdjYeMETLAHcZEeOPuUBZ9cnT5E1cSidB8DFmw72/01B4R4cxFZheK/AUFcDmLVSVTbbIxYTPc4Q0IQzD2fI1xtYIwByPFDr6GsFNxH3pqU4mMBIB8zhcvqAsf48wNkjxsWQv8Ytk8J3VUXtwYAwaM41DaXtQczORAJCL/ubsxwJ++iurEWn/pGbgxsVJtI6IT+4mArJjxLYOExVIwbvxGM4IRchkSeChFMMv7iYnVcciankUlIq5mFKk2Sv6d+0nB/H02+sszWePc2Z0T9tOuujNNsItJk9TIpM2YiMdZVTcY4LBpXC0QF7I7drWEd+ioTWrdqwIHQoemSZ6Orqqz8WBMrKK606sF0njsFR/oos4a0H7TaVatI9Ghn3wTorc6B+IvXpZOrSOxDEruTx6ZGt3WPZBMaHZZiwrazVSlWKdA7lUv3/IGKbUSlWKKVajgboEkdkzApy5U7woYr4KBYxOryfLvnQIpK6rrEkYJEK+CS5VHp0D01F6J7NikmapksKzJkuptRupV3xFZKapdRUTmKSvafv5OI1K3UBeAHhOIa4D6TC0AVY2ey4ZSrdX2FJ/OZX8q9OsLou/W1tVYZQURP2Bdm/EYBTFjFmdK9CFR6rrXTllLgCxEHq5cVICorXwvE40FQ6TS7OsciAOTyfhNUyxrshYp1WCb9gJkKcXWikzRmgoxRHoDsmiKIP253Jc5djAJeSIoPEWIZ7UnIHiAYRNx9AYkb1nzbtEZ2hKdlICUge9F84GAlwwMnQGxACCmW7AL3zuQAgGI9K6zWIv3/JIZ4zZEUQSykBeEqI3J0Kb6O4OOxfJxJy+n7v3cawBzeaYAIW1t0GW+lsiX3GmsevNos+HH/tY7Ns5pfOBYMN6bkXI20Lb/ee/XmR0D2l+48YnN3yIkMgRMZrG63EYwUWJfMyCttaTpvRtfYBmxLc9zh3EbUTzYk7Nhjx68j+RgFi+ywuOCtvSBZQvwXbO490s2bOevur8L6DOQ33XyVes+R+Q5Ij2dwP9TYAKAKNjkVAAAAABJRU5ErkJggg==" alt="camera">
															</a></li>
															<li><span>$50.00</span></li>
														</ul>
													</div>
													<div class="lp-list-view-content-bottom">
														<ul class="list-style-none list-pt-display">
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	07 Feb 2015
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-clock-o"></i>
																</span>
																<span class="lp-list-sp-text">
																	15 Days Left
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-check"></i>
																</span>
																<span class="lp-list-sp-text">
																	Published
																</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Pricing Plan</h4>
														<div>
															<p class="lp-list-view-paypal-tit">$40 - <span> for 30 days</span></p>
														
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">
														<img src="/images/listview/post287x191-4.jpg" alt="list-1">
													</div>
													<ul class="lp-list-view-edit list-style-none aliceblue">
														<li><a href="author.html#"><i class="fa fa-pencil-square-o"></i><span>Edit</span></a></li>
														<li><a href="author.html#"><i class="fa fa-times-circle"></i><span>Remove</span></a></li>
													</ul>
												</div>
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
														<h4>Hotel Rammizine </h4>
														<ul class="lp-grid-box-price">
															<li class="category-cion"><a href="listing.html">
																<!-- Home icon by Icons8 -->
															<img class="icon icons8-Food" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACWUlEQVRoQ+1ZvXnbMBB95zKN5REwQZQJAk0QuwxZRJnAHsEj2BNYKciUsScQNrAzAUZI0qQ0/IEy80E0IQIgKOhTwE68H9w7HN7hKMLAw79LrlXEZyb6VFPL25hoEEgt1w2Qgi16gSSW7wTCKznHCT5BYU7AuVZWwD0IT3jGQ2OcUC5K9tRNqnVHeC1XBHwxDRTwTRRsqd+lljsD0YqLWmrk71+Nfq4LNjcdpJabsew8I7ySvwjqz6a06FSU7Mw0Ti13AsJ/yBn+4kqU7LoppUpe4x1uxAX73fxOLHcqreawA5cAzokwG2K2fciVgk7gPYBbp8POK7kkwt0+ggtdQyl8FSVbWUtL7wQRHl/p9hYKqz70oQGMsWuqhLCkTaVAKXwwY9s67C2lKr19Bbsas/BUtryWNxqM2Qr0WttANEsRZl20UwUV4retGn1mTBbdArKopdLO1wUbvLqEBBHLpi9OJyC8ko9E2GqGbVD66iIKdtHpL5PqBwNpDW0Z7e7gvvTNdZ12xFZyh/T+/wRyDKWlp8OPfUCUwoMoWTOztM+illPrv2FXp9KKRZux/ASzVqwAYvkJBpL7iGULYvWd3EdsmTyE906sta8rh2+fCimtqfuCr//cR2K1gCh+ch85psPeOwLneaTzTSBGQnIf+ffxIc8j4UwcTL/hS05jGQwkzyN5HtlkwIeWvej3EOYOG0AvIGPmBZcMj/HvCmT0vDAAZLR/JyC+JOpT276+R5WW72IZiGPGghuio3/z26/XtT+G/+M+I74ZSqW/63OQlQZTBWtbt/t3xgvz/SNvFqVEmwAAAABJRU5ErkJggg==" alt="restaurents">
															</a></li>
															<li><span>Price on call</span></li>
														</ul>
													</div>
													<div class="lp-list-view-content-bottom">
														<ul class="list-style-none list-pt-display">
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	03 Feb 2015
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-clock-o"></i>
																</span>
																<span class="lp-list-sp-text">
																	07 Days Left
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-check"></i>
																</span>
																<span class="lp-list-sp-text">
																	Published
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-fire"></i>
																</span>
																<span class="lp-list-sp-text">
																	Hot Lisiting
																</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Pricing Plan</h4>
														<div>
															<p class="lp-list-view-paypal-tit">Free</p>
															<p>Upgrade your Pricing Plan</p>
														</div>
														<div class="lp-list-view-select">
															<div class="ui-widget border-dropdown">
															  <select class="comboboxs" style="display: none;">
																<option value="">Select one...</option>
																<option value="Free" selected="">Free</option>
																<option value="$25 - 30 Days">$25 - 30 Days</option>
																<option value="$40 - 30 Days">$40 - 30 Days</option>
															  </select><span class="custom-combobox"><input title="" class="custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left lp-search-input location_input lp-home-locaton-input ui-autocomplete-input" autocomplete="off"><a tabindex="-1" title="Show All Items" class="ui-button ui-widget ui-state-default ui-button-icon-only custom-combobox-toggle ui-corner-right" role="button"><span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-text"></span></a></span>
															</div>
														</div>
														<div class="lp-list-pay-btn">
															<a href="author.html#">
																<i class="fa fa-paypal"></i>
																<span>Via Paypal</span>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>			
					
					
				</div>
			</div>
	</section>
	<!--==================================Section Close=================================-->
	
	<!--==================================Footer Open=================================-->
	<footer class="text-center">
		<div class="footer-upper-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="blog-archive.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="login.html">Join Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- ../footer-upper-bar -->
		<div class="footer-bottom-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-about-company">
							<li>Copyright © 2016 Listingpro</li>
							<li>45 B Road NY. USA</li>
							<li>Tel: 007-123-456</li>
						</ul>
						<p class="credit-links">Proudly Listingpro by <a href="http://www.takethemes.com/" target="_blank">Takethemes</a></p>
						<ul class="social-icons footer-social-icons">
							<li><a href="author.html#"><!-- Facebook icon by Icons8 -->
								<img class="icon icons8-Facebook" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAC10lEQVRoQ+1ai3HTQBTc7QAqgFQQqADoAFcAHZBUAFRAUgGkApIKCBUkqYCkA6hgmVXuPGf7ZF0snyTP6GY8ceyT7+17+z7Se0TLkvQBwFsAr8KrbesQn98C8OuS5FXuQK5/KOk9gG8AXg4h4Q5n3AM4JXmZXrsCRJIBnIQNDwDOAFyTtDZGW5LMCrPDsr0IgpyRPI1CLYFIstCfwhdG7P8ntyQZjBXudU6yUXwDJNDpZ/jy9dgW6NJesNBN2LcwzSKQP8EnJmuJjC9Hy9yTPKKkjwC+A3ggOVUHzxpJkh3fPrMwkB8AHGoPxhoRVeIvFwZirjkqTN43MvSy3Jb/1kDUeD25kVO6nG4K3y/lHwNIqBqceK3R1C+vAZj3zlu/S6LnKEBC2HSYLw0qTUTaZvnBgQQQvwA8s7YBOMi4dvqbOK+zt0H6rwNQJ+XHABKDygVJh/ytq5TygwJJKofiXDVVIE/OVVMF4mj0BsA7kn6/XJLsM58BOIptBIGutDA0tVpzVVJZZH3mkIA0IHPW6goIoXJ/VFIpF0t+tG3PtjP6nj8lavUqkaoDiQekVsrxPbdvzbLP06SZKRzrUmtfQEZ39j7cl+QSxeWMC0e/b12DUatLozkJJX0JuaWznJk6kFgJfCVpUAdrkdZK4FCd/Yikb7TGt0iP8PuPpOuwrau6j6Snz5m9yxyPT0nrJsTZIgVWyCqpTwYuPXP2kQJNzT5SoKSNLTO1CrQ2U6tASTO1eilJkh/hH9ds9NRy9qQpejdI660ikNgQbVpvflTpnkVnL2IX0/uaikBiN3oR29OxO1qlIVoDSNIIbZ7wDzIwsG8grQMDwfzpCMcJyfNdqdR6X51puD61aJXkMZM4XrI6whEPXptHMd18QVFTsui+ekcgwQJuS9i5Y+thCcJnt405GUCcwtmXYfb1O55aMmPax5zWblgczWIL2XlmzHWXDJ6tAIhC/QfJdOM+5ZDCYAAAAABJRU5ErkJggg==" alt="facebook"></a></li>
							<li><a href="author.html#"><!-- Google Plus icon by Icons8 -->
								<img class="icon icons8-Google-Plus" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEFElEQVRoQ+2a8VEVQQzGkwqUCoQKhArUCpQKhAqECoQK1AqECsQKlArUCsQKhAri/J7Jzd6+23t3B3dv/yAzzGOYPV6+TfbLl+ypFMzM9kXkrYjw+bK0bqG/fxeRnyJyqap8rpnmf3EAHypwvrRHgDrNAbWAmNkbEfksIk9F5E5ELkTkSlV5eGtmZmQEvh2JyBMRuRWRY1W9CqcaIGbGIkBglyJyoqo8UI2ZGRv80VMevw4DzAqIme2KyA+PBEiJRLWWbDobfaCqNwHkm58JDhORqd7MjLR67al/qB6N334mdmtLp9KOeprd+JnZAwg5905EPqnqSfWhSBxs+W5mMNILEXm1bXYau4nOZhyLayLy1w/52P9T0/pbgFhNHk31pQGiqmtVfuo/XfK5CMQjkCV3ve+7HiNSSyTCj3tHxMyQB8gZdBo9S8muReRsrho1GYgXIVQyMh9VgExIJTaAaH5OkdulRuihIjsJSKI6r1W11TV6Q4ZKoF/ALlT1+KEc7tFcqzo4mH4TcclznXLGzNBqdJdhs8ue0RFJZLP0FU8zI9WeOZKvqkrazWZTgDRSZgOQUNM4f6Oqe7Oh+N8UDk+tRGWGTzulvsX7/i+xcG7pc18gTa+c73YGeo0UHjo6o4Dw5ZlKLrbEGZBzVT0b4nyuwodGcgoQBhIM7MJo+teGZQlFU2cGt85LAmEUEz1yFD3otRkZeR/NNGaHYcaYYrgYEE8v5AjTi+ceFkCshnhJdf/D74xohqRUrFkUSPKl1AYqOxqLSAUwlnSm3CZQWwGSOjWFbqe2110EMPqwl3Y0G7WyjAEzRbFotQLh3MBeIRYB0CsYqwNiZszDMCKQ9ySAa7Fa6WBvOj99KmFSarkCppZw2HEchgp2ir4kjUwRTIciaI2l5iyI7+n03IFzT58WxXpPAh2nLDaoui/CWmZGRxhT+l569aJIg9XUGlWlQPba7EAyVho06HYwpFX0JXubCuQSQLhygJmwwR1ftgEbi+QSQNJDOAYIlZ9J+Z2qUv1nscGsZWboqWCiQQcXj5P+fdZbsBTIytES3ZlZKt9ZS1Q677qTOkEEiAZt7mApPzZkfha5FrljitJ70ZNdcfFdgIGG2em1W19vrJikAGKUlJ8AJNJ3ddGz8erN6wPropIHICITd/AUyJg6LnK9nV+94QDNELsLTRbv1n23qSc8kxY9KnyA4gWDUb3I2Ej4GSR9YVQ+D+J6OtJrkengFMc7JE0U6dWAI31hIBQsA2ckSLVmZiGXmAvsNy8MeKgQgjGPgqnoK2p8hQMiCbnUfoUjoU3AACJeXIl+/Ne2QDlrch5j4h8v/Bx1vlSTgIF5AJAyVE1pxn0LIFqEUrzJdcoNhoKl0j5jSWCcA84vP5BRZzH+B8zg25A0mqpxAAAAAElFTkSuQmCC" alt="google-plus"></a></li>
							<li><a href="author.html#"><!-- LinkedIn icon by Icons8 -->
								<img class="icon icons8-LinkedIn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADv0lEQVRoQ+1a7VEbMRTcrSDpIFBBoIKQCoIrSKggUEGggkAFgQogFYRUELuCQAUJFbzMnp8uurNOJxv7Ds9YM/6B0fm02vf2fUhExzCzjwCOABz4p2vqEN9PAehzT/Im9UK2vzSzYwBfAewNscIV3vEA4IzkXfxsA4iZCcCpT5gBuPZd0G6MNsxMViHr+ATgrS/kkuRZWFQNxMwuAXwG8ATgnKT+fnHDzLTR5wBeAbgiWW18BcTN6dZBHJEclYG+3XOGfvm8icwsAPntPiHbe5FMJHxZTMgVHkju08xkd98AzEjKFrdmmJksRz4zERA5tKR2a9gIO+3+IlZuBES2JiYOu3zDY4qoDIxpJ6QaSU0fitLIV6YCYpXXkwsxxYVAZifzS41rkidDLTz1nnr9OSARdZJkMRKCkIKmREESeEJS5jnKKAUSzK6SuHilkUhMSR6OgmIeOuYW1cNIp9mZ2WsAf3JmOQS4UiB/3Xz2SSrHqYeZKRdT/HkiKVCjjFIgQZrvSE5aQJQJyFduSHaJwcbBlQLRrktq5dRiJHZ2/U8icNBma+Orb1pGv4+4/Cp2CMCb1gIfxcjYeVkRIy1TUhqtj4aUqqFiQ7LQWlc/I1HUz62z8p8l52pDPkQVqH5fwiIz1gZ9LzXXIkbCpL7dVlZQOtcXKpHIDYFSCnTR9+6lgGTSlzrOFKQ61VwfEgllBmKzqn08LokpgVQSW5kwgPckBSw5xgSiElrFW25xEph7V8sF6V/FR/oSymUYCVVnFkRYpAfcIP2d+dzgjPTZeur/UT5XVYEdc4pUa22MRDv9xcsCBVQFWWUPaiIkTc3MNEcxbCFxdd8aHkhGojud2szUMRH4umMyto+EZkGdEbgfKG6o7r4gqUU3hplJyX4A+EkyBOR6zuA+ErHRcNyoFZWsa6JyIeknYwDJ1TbFvphgbFgfWbWAazh0oq+wYySpGFGuVZLOdJpHdyen3yzXRXlprpUCupZnd0DiVszOtObesjOtdTTo2ju5ll3dqdYzWqY7RnJpxjNNKxxfLRz0lHZGlumi5AJiXxXZfjY66Jllj97MTA2Adz0vUA/qeJm5iRSl+D2tFCnUONXRWzgMHfWco4+Njnr9//mNO22oi7fmQDQ6TXskude+MKAGgBpi23lhwFkJVzgERlc4rlahe9PPmJmumYRLDc0rHFGrJoDRV2JFrRoV/aMy5Ook0ZE/hyPyRlel65qTALXPQza92aW/ry7MafaaU0vahD5cPAtXi0pftu556heHi2fJo/B/rbIkXGKb1eoAAAAASUVORK5CYII=" alt="linkedin"></a></li>
							<li><a href="author.html#"><!-- Instagram icon by Icons8 -->
								<img class="icon icons8-Instagram" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAFNUlEQVRoQ9WagVUUQQyGkwqUCpQKlArUCoQKxAqUCoQKhAqECsQK1AqECtQKxAri+8ZkzQ67d3vL3HHOe/dg7/Z25k/+JP9kTmVkmNkrEXkuIk/9NXbrJt6/EhFel6r6aWhCrd80s30ReS8ijzexwhlz/BCRI1W9zN/tATEzALz1G36KyKmIfFFVrHFvw8xgBexgbY98IaeqehSL6oCYGYt+4x+AmOutG2YGGAzOOFPVYvgCxOn00T/cu28PLLOee+ib33cAzQLId4+JrfGEmT0UkQ8iQszmQWy8FpFD98wPVd1VM+MNvvBTVbcmwM3ss8fFkIM+qeq+mRH4xMwBQM5FhFS7Nd5wupsj2FHVG38PL/0qMaHK2iNeLriAa2SFrYoNMytAWHB2SX4/xcoVQAa/sCzg1v35FCDZc82BuJWgKl6GCvxlUIugCH8vlmXGACIio9RaCxAze+eZZGrCIFDPVfVkyLtm9kVEno14vgR7UyBmRsUl6wUAFAEpktdNWN49hYdYAK+o0AB6raosvBuefklELyswaK3DlAD+hsZdYqSSNF9F5Lhe0FgsuQGOk9XfqurZqrHXrX8uEDPDC9QgRi91mxlWxOp4KccI1u8p2EpyQDWK3eQxCiSl4ykP+82Cwwsu/dFoUGjRIOjxwIXzHHpCxQdTJnUh+2JhjKRsMeWZLwDhfKYSh/WhGfy+qmKEz/FiBDEZjGfcONV4xqQR9WWRR0brii+YAgplCp0qENdu6V7g1ivzReO5J56OA0xUaihIgS4VPY86FOYCIThJs19VFTqgnEMZAOL50ORDJnYDALiAUdU9f16k3RNVZb61AAmVHJQKYCuBiJVVYMrCE8WKqm0OJO1Zikr2RQCMwC7AJpH7toXxLLEBjXY9Xv6p2mpLe2dqpR1k2ZUl+d/RbA6Qik4UxvN6rqYxkiRD0Ip0Sb0ok88F4UBiTxT7jPDSLSO18Aj7AGhU5H5L+d+T46p76RqJs9PaI720PFcRjHlu1NIL9iOTCuKiDU3vAdVEcym2SSBUYXJ+UKt3PReAG4WKTz26VtWniVrlujW1olD998EeDbw6/dKJLAJu7kgdk42k33B/qbheEClcKNYWBREl/dgLYiiIWw2RO6df5zLVt1u4mYVE6VTsKl6pBGctUQb7bK2AxMILnWrhF5J8CphaNUdQp/q0PtHoXgkdlGV8UAzP8P4UGU8jGrpmSoWMH+16NvGIA2ELGw3vvLEKSc5t/I9sIX2WIwlPqaRv5EjZAvB5SP9qY1Ua00OebQbEFxUUI2aYNHaJWJTXsi0rXiALcsYRu0OMgwQapFSAagrEwUTPmMuuA+Lcj5YPO0m8ENYvzQdvQEQ/lzOZOIuhcRcNjcFQaw6k8kzQCWtO2pc4lSJO+P5CT6zNI+nBWB+L5oZbNOh+VzEC5bK3eAwNPTw6GBO1W9bikTyJ15Qp8RFfK3EytC9flL7XDiR5KFo+0cTOMRJNbBpxsw5YVwbi+2eCc2uGmZE8kC/duUluB9XyPLawW3WC5cklCmZsif/J//roLTUVoAEFbxYFWrvRCyrdFmpNqOTe0VtU6q6PlBoNgKH4YYF7oZnTiSYH6wBEPhsJlXwQx9ND+gmKjR20tDb41Od1ZyOpi1902cIfDDjN8Fh92DJ14lb3AYDjiNJ2Gv3BgH+Yf8Ix69Cl1aqX1JEsafo/4Ug1IIOBblzTJLvXgHcPQHOCO474OhAlHQ9IgFpybMLQq8wxKGluAak0FKDI1VGdV5mw5b3sW+KHZ4Oa7A8mMc1cZlo+UAAAAABJRU5ErkJggg==" alt="instagram"></a></li>
							<li><a href="author.html#"><!-- Tumblr icon by Icons8 -->
								<img class="icon icons8-Tumblr" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADeUlEQVRoQ+2ajXHTQBCF91UAVACpAKgAOgBXQFIBSQWECkgqIKkgSQWECnAqIKmApIJlPs2d5uScrL8jthndjMdjSzrtu919tz8naxnu/snM3pvZm/Bpu/Up/l+aGZ9LSVe5F2r1T3f/aGbfzOzVU0g44h23ZnYk6TJ9tgHE3QFwGG64M7MTM7uWxGpsbLg7VoF1INvLIMiJpKMoVA3E3RH6c7gAYn5v3XB3wLDgjFNJ1cJXQII5XYSLbzetga7VCxr6Fe5bYGYRyO/gE1uriYwvR83cStqTu++b2Xczu5O0rQ6eVZK74/j4zAIgZ2YG1e6MNiKqxF/OAYKtwQqTfcPdj83sS2b5aqfssv8h1xNfWQLEK6+XHu0pQyYNpPHHzJ7nnisxf27eWv5SQNwdAAB5kFSDKTV/26L+CyBEBFD4T0lsXtXYRSBZ0tgpIInTPbAfSbrfOY0E34D52IO+SoK56rETGnF3hMcvoO8bSXw3xtYDCfkKgSUMdUN0mprUqmmtofIzSQdDqf6R6Q5dseAPRJ+RmUh09nMgAmtdm9m7dYJO2WNG06+7xwCTfOVYEmw1agxdxKIbYomXl2S0KRopGdJMnmsGEldgxV6pbixabPhHQgxZX9qUs6e5fS1YmzAtwFNA55JI7kaN0aY1dMMrSQ5FWWsGUiBxmzXSx/u6fKDrep93rLtndvbZ2WdnX+9Fs4+M8BF6K6+r+uxKcyYkXiRotDMIVRrNmz6MVlIjUdBsyTWpz1JZoYJO4Zlcn/yeWlgsnN9LetFH+PSekkBYxQ9mdtCWLSaF8pycZJpVF2pMFFwSSOxTXElihbMjNJOiBtAKH8L/5ZRNsySQWPMFwJ4kBBw0tgJIcNhYLm1NsHqFGSP2mmIaCUBwWJz+mZn1rlO5O4xFP4XvRhW/r0pTIGtZZ8CECIPjAwbzonRK9bFubbs79S1MkXvjYQReQc2Y2tgg+k1qzjdFW29hYoSJvfCudYCxMEt65nXhu+uheH219Rb7GlV3tO8kHTZPDs68rDoaioPSKtqKxzEmHURIioWL2J6O3dGdaYgm2qi60f/XgYHAPGmZ51DSaQkzKz2HuxOXxeMlzSMcifOkYDA3ftMTnGTLU8EEEoHxiCJibNZoebcdcwJAX+aZKufQ52E6LKb9mFM6YxIbEaUShm9ywHaR6bJ7zV8Cie0+55PMmQAAAABJRU5ErkJggg==" alt="tumblr"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- ../footer-bottom-bar -->
	</footer>
	<a href="post-submit.html" class="add-listing-mobile lp-search-btn">Add listing</a>
</div>
@endsection