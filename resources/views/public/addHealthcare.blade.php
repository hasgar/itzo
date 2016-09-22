@extends('public.layouts.master')

@section('title', 'Add Health Care - Chikitzo')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
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
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo">
								<a href="/">
									<h2 class="main-logo"><i class="fa fa-heartbeat" aria-hidden="true"></i> Chikitzo</h2>
								</a>
							</div>
						</div>
						<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>s
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
									<li><a href="/user/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="page-heading listing-page archive-page ">
			<div class="page-heading-inner-container text-center">
				<h1>Add Your Health Care</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Add Your Health Care</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->
	
	<!--==================================Section Open=================================-->
	<section>
		
		<div class="lp-section-row aliceblue">
			<div class="lp-section-content-container-one">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="login-form-popup lp-border-radius-8">
								
								<div class="siginupcontainer page-signup">
									<h1 class="text-center healthcare-heading">Add Your Health Care</h1>
									<form id="add-healthcare" class="form-horizontal margin-top-30"role="form" method="POST" action="{{ url('/register') }}" enctype='multipart/form-data'>
                       					 {{ csrf_field() }}
										<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name">Health care Service name *</label>
											<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter health center name">
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email">Email Address *</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter health center official email" required>
											 @if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="sipassword">Password *</label>
											<input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
											 @if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
											<label for="sipassword">Confirm Password *</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Repeat password">
											@if ($errors->has('password_confirmation'))
												<span class="help-block">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('treatment_type') ? ' has-error' : '' }}">
											<label for="treatment_type">Type of Treatment *</label>
											<select class="form-control" id="treatment_type" name="treatment_type" required>
<option value="">Select your treatment type</option>
@foreach ($types as $type)
										<option value="{{$type['id']}}">{{$type['name']}}</option>
										@endforeach
</select>
											@if ($errors->has('treatment_type'))
												<span class="help-block">
													<strong>{{ $errors->first('treatment_type') }}</strong>
												</span>
											@endif
										</div>
											<div class="form-group {{ $errors->has('working_hours') ? ' has-error' : '' }}">
											<label for="working_hours">Working Hours ?</label>
									 </div>
									 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											<div class="col-md-6 no-left-padding" ><select  class="form-control"></div>
											<option value="Monday to Saturday">Monday to Saturday</option>
											</select>
											</div>
											<div class="col-md-3"><select  class="form-control" name="working_hours_mon_from" id="working_hours_mon_from" required>
											<option value="01 AM">01 AM</option>
											<option value="02 AM">02 AM</option>
											<option value="03 AM">03 AM</option>
											<option value="04 AM">04 AM</option>
											<option value="05 AM">05 AM</option>
											<option value="06 AM">06 AM</option>
											<option value="07 AM">07 AM</option>
											<option value="08 AM">08 AM</option>
											<option value="09 AM">09 AM</option>
											<option value="10 AM">10 AM</option>
											<option value="11 AM">11 AM</option>
											<option value="12 PM">12 PM</option>
											<option value="01 PM">01 PM</option>
											<option value="02 PM">02 PM</option>
											<option value="03 PM">03 PM</option>
											<option value="04 PM">04 PM</option>
											<option value="05 PM">05 PM</option>
											<option value="06 PM">06 PM</option>
											<option value="07 PM">07 PM</option>
											<option value="08 PM">08 PM</option>
											<option value="09 PM">09 PM</option>
											<option value="10 PM">10 PM</option>
											<option value="11 PM">11 PM</option>
											<option value="12 AM">12 AM</option>
											</select>
											</div>
											<div class="col-md-3 no-right-padding"><select  class="form-control" name="working_hours_mon_to" id="working_hours_mon_to"  required>
											<option value="01 AM">01 AM</option>
											<option value="02 AM">02 AM</option>
											<option value="03 AM">03 AM</option>
											<option value="04 AM">04 AM</option>
											<option value="05 AM">05 AM</option>
											<option value="06 AM">06 AM</option>
											<option value="07 AM">07 AM</option>
											<option value="08 AM">08 AM</option>
											<option value="09 AM">09 AM</option>
											<option value="10 AM">10 AM</option>
											<option value="11 AM">11 AM</option>
											<option value="12 PM">12 PM</option>
											<option value="01 PM">01 PM</option>
											<option value="02 PM">02 PM</option>
											<option value="03 PM">03 PM</option>
											<option value="04 PM">04 PM</option>
											<option value="05 PM">05 PM</option>
											<option value="06 PM">06 PM</option>
											<option value="07 PM">07 PM</option>
											<option value="08 PM">08 PM</option>
											<option value="09 PM">09 PM</option>
											<option value="10 PM">10 PM</option>
											<option value="11 PM">11 PM</option>
											<option value="12 AM">12 AM</option></select>
											</div>
											@if ($errors->has('working_hours_mon'))
												<span class="help-block">
													<strong>{{ $errors->first('working_hours_mon') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('working_hours_sun') ? ' has-error' : '' }}">
											<div class="col-md-6 no-left-padding" ><select  class="form-control"></div>
											<option value="Sunday">Sunday</option>
											</select>
											</div>
											<div class="col-md-3"><select  class="form-control" name="working_hours_sun_from" id="working_hours_sun_from"   required>
											<option value="01 AM">01 AM</option>
											<option value="02 AM">02 AM</option>
											<option value="03 AM">03 AM</option>
											<option value="04 AM">04 AM</option>
											<option value="05 AM">05 AM</option>
											<option value="06 AM">06 AM</option>
											<option value="07 AM">07 AM</option>
											<option value="08 AM">08 AM</option>
											<option value="09 AM">09 AM</option>
											<option value="10 AM">10 AM</option>
											<option value="11 AM">11 AM</option>
											<option value="12 PM">12 PM</option>
											<option value="01 PM">01 PM</option>
											<option value="02 PM">02 PM</option>
											<option value="03 PM">03 PM</option>
											<option value="04 PM">04 PM</option>
											<option value="05 PM">05 PM</option>
											<option value="06 PM">06 PM</option>
											<option value="07 PM">07 PM</option>
											<option value="08 PM">08 PM</option>
											<option value="09 PM">09 PM</option>
											<option value="10 PM">10 PM</option>
											<option value="11 PM">11 PM</option>
											<option value="12 AM">12 AM</option>
											</select>
											</div>
											<div class="col-md-3 no-right-padding"><select  class="form-control" name="working_hours_sun_to" id="working_hours_sun_to"   required>
											<option value="01 AM">01 AM</option>
											<option value="02 AM">02 AM</option>
											<option value="03 AM">03 AM</option>
											<option value="04 AM">04 AM</option>
											<option value="05 AM">05 AM</option>
											<option value="06 AM">06 AM</option>
											<option value="07 AM">07 AM</option>
											<option value="08 AM">08 AM</option>
											<option value="09 AM">09 AM</option>
											<option value="10 AM">10 AM</option>
											<option value="11 AM">11 AM</option>
											<option value="12 PM">12 PM</option>
											<option value="01 PM">01 PM</option>
											<option value="02 PM">02 PM</option>
											<option value="03 PM">03 PM</option>
											<option value="04 PM">04 PM</option>
											<option value="05 PM">05 PM</option>
											<option value="06 PM">06 PM</option>
											<option value="07 PM">07 PM</option>
											<option value="08 PM">08 PM</option>
											<option value="09 PM">09 PM</option>
											<option value="10 PM">10 PM</option>
											<option value="11 PM">11 PM</option>
											<option value="12 AM">12 AM</option></select>
											</div>
											@if ($errors->has('working_hours_sun'))
												<span class="help-block">
													<strong>{{ $errors->first('working_hours_sun') }}</strong>
												</span>
											@endif
										</div>
										
										<div class="form-group {{ $errors->has('certificate') ? ' has-error' : '' }}">
											<label for="certificate">Do you have certification ?</label>
											<select  class="form-control" id="certificate" name="certificate">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
											@if ($errors->has('certificate'))
												<span class="help-block">
													<strong>{{ $errors->first('certificate') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}"   required>
											<label for="country">Country *</label>
											<select  class="form-control" id="country" name="country">
<option value="">Select your country</option>
@foreach ($countries as $country)
										<option value="{{$country['id']}}">{{$country['name']}}</option>
										@endforeach
</select>
											@if ($errors->has('country'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}"   required>
											<label for="state">State *</label>
											<select class="form-control" id="state" name="state">
<option value="">Select your state</option>
</select>
											@if ($errors->has('state'))
												<span class="help-block">
													<strong>{{ $errors->first('state') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}"   required>
											<label for="city">City *</label>
											<select class="form-control" id="city" name="city">
<option value="">Select your city</option>
</select>
											@if ($errors->has('city'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
											<label for="address">Address *</label>
											<textarea range="[13, 23]" class="form-control" name="address" id="address" placeholder="Enter your healthcare center"  required>{{ old('address') }}</textarea>
											@if ($errors->has('address'))
												<span class="help-block">
													<strong>{{ $errors->first('address') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('pin') ? ' has-error' : '' }}">
											<label for="pin">Pin *</label>
											<input type="text" class="form-control" name="pin" id="pin" required value="{{ old('pin') }}" placeholder="Enter health center Pin code">
											@if ($errors->has('pin'))
												<span class="help-block">
													<strong>{{ $errors->first('pin') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('contact_name') ? ' has-error' : '' }}">
											<label for="contact_name">Contact Person Name </label>
											<input type="text" class="form-control" name="contact_name" required id="contact_name" placeholder="Enter contact person name" value="{{ old('contact_name') }}">
											@if ($errors->has('contact_name'))
												<span class="help-block">
													<strong>{{ $errors->first('contact_name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('contact_email') ? ' has-error' : '' }}">
											<label for="contact_email">Contact Person Email </label>
											<input type="text" class="form-control" name="contact_email" required id="contact_email" placeholder="Enter contact person email" value="{{ old('contact_name') }}">
											@if ($errors->has('contact_email'))
												<span class="help-block">
													<strong>{{ $errors->first('contact_email') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
											<label for="mobile">Mobile *</label>
											<input type="text" class="form-control" name="mobile" required id="mobile" placeholder="Enter health center mobile number" value="{{ old('mobile') }}" >
											@if ($errors->has('mobile'))
												<span class="help-block">
													<strong>{{ $errors->first('mobile') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
											<label for="phone">Phone *</label>
											<input type="text" class="form-control" name="phone" required id="phone" placeholder="Enter health center phone number" value="{{ old('phone') }}">
											@if ($errors->has('phone'))
												<span class="help-block">
													<strong>{{ $errors->first('phone') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
											<label for="fax">Fax</label>
											<input type="text" class="form-control" name="fax"  id="fax" value="{{ old('fax') }}" placeholder="Enter Health center fax">
											@if ($errors->has('fax'))
												<span class="help-block">
													<strong>{{ $errors->first('fax') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
											<label for="website">Website</label>
											<input type="text" class="form-control" name="website"  id="website" value="{{ old('website') }}" placeholder="Enter Health center website address">
											@if ($errors->has('website'))
												<span class="help-block">
													<strong>{{ $errors->first('website') }}</strong>
												</span>
											@endif
										</div>
										
										<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
											<label for="description">Describe your health care *</label>
											<textarea class="form-control" name="description" required id="description" placeholder="Tell us more about your health centre (less than 200 words)">{{ old('description') }}</textarea>
											@if ($errors->has('description'))
												<span class="help-block">
													<strong>{{ $errors->first('description') }}</strong>
												</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('fecilities') ? ' has-error' : '' }}">
											<label for="fecilities">Available Fecilities</label> <br>
											<label for="fec-lab" class="fecilities-lbl"><input type="checkbox" id="fec-lab" name="fec-lab" class="fecilites-check"> Lab</label>
											<label for="fec-parking" class="fecilities-lbl"><input type="checkbox" id="fec-parking" name="fec-parking" class="fecilites-check"> Parking</label>
									<label for="fec-pharmacy" class="fecilities-lbl"><input type="checkbox" id="fec-pharmacy" name="fec-pharmacy" class="fecilites-check"> Pharmacy</label>
									<label for="fec-wheelchair" class="fecilities-lbl"><input type="checkbox" id="fec-wheelchair" name="fec-wheelchair" class="fecilites-check"> Wheelchair Access</label>
									<label for="fec-ambulance" class="fecilities-lbl"><input type="checkbox" id="fec-ambulance" name="fec-ambulance" class="fecilites-check"> Ambulance</label>
									<label for="fec-inpatient" class="fecilities-lbl"><input type="checkbox" id="fec-inpatient" name="fec-inpatient" class="fecilites-check"> Inpatient</label>
									<label for="fec-bloodbank" class="fecilities-lbl"><input type="checkbox" id="fec-bloodbank" name="fec-bloodbank" class="fecilites-check"> Blood Bank</label>
									<label for="fec-fitnesscentre" class="fecilities-lbl"><input type="checkbox" id="fec-fitnesscentre" name="fec-fitnesscentre" class="fecilites-check"> Fitness Centre</label>
									<label for="fec-yoga" class="fecilities-lbl"><input type="checkbox" id="fec-yoga" name="fec-yoga" class="fecilites-check"> Yoga</label>
									<label for="fec-massage" class="fecilities-lbl"><input type="checkbox" id="fec-massage" name="fec-massage" class="fecilites-check"> Massage</label>
									<label for="fec-sports" class="fecilities-lbl"><input type="checkbox" id="fec-sports" name="fec-sports" class="fecilites-check"> Sports</label>
									<label for="fec-tours" class="fecilities-lbl"><input type="checkbox" id="fec-tours" name="fec-tours" class="fecilites-check"> Tours</label>
									<label for="fec-insurance" class="fecilities-lbl"><input type="checkbox" id="fec-insurance" name="fec-insurance" class="fecilites-check"> Insurance</label>
										</div>
										<div class="form-group {{ $errors->has('payment') ? ' has-error' : '' }}">
											<label for="payment">Payment Modes</label> <br>
											<label for="pay-cash" class="fecilities-lbl"><input type="checkbox" id="pay-cash" name="pay-cash" class="fecilites-check"> Cash</label>
											<label for="pay-creditcard" class="fecilities-lbl"><input type="checkbox" id="pay-creditcard" name="pay-creditcard" class="fecilites-check"> Credit Card</label>
									<label for="pay-debitcard" class="fecilities-lbl"><input type="checkbox" id="pay-debitcard" name="pay-debitcard" class="fecilites-check"> Debit Card</label>
									<label for="pay-cheque" class="fecilities-lbl"><input type="checkbox" id="fec-cheque" name="fec-cheque" class="fecilites-check"> Cheque</label>
										</div>

										<div class="form-group {{ $errors->has('accommodation') ? ' has-error' : '' }}">
											<label for="accommodation">Does accommodation available?</label>
											<select  class="form-control" id="accommodation" name="accommodation" required>
<option value="0">No</option>
<option value="1">Yes</option>
</select>
											@if ($errors->has('accommodation'))
												<span class="help-block">
													<strong>{{ $errors->first('accommodation') }}</strong>
												</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('accommodation_type') ? ' has-error' : '' }} accommodation-type">
											<label for="accommodation_type">Accomodation Type</label> <br>
											<label for="accommodation_single_ac" class="fecilities-lbl"><input type="checkbox" id="accommodation_single_ac" name="accommodation_single_ac" class="fecilites-check"> Single AC</label>
											<label for="accommodation_single_non_ac" class="fecilities-lbl"><input type="checkbox" id="accommodation_single_non_ac" name="accommodation_single_non_ac" class="fecilites-check"> Single Non AC</label>
									<label for="accommodation_shared" class="fecilities-lbl"><input type="checkbox" id="accommodation_shared" name="accommodation_shared" class="fecilites-check"> Shared Rooms</label>
									<label for="accommodation_general" class="fecilities-lbl"><input type="checkbox" id="accommodation_general" name="accommodation_general" class="fecilites-check"> General Ward</label>
										</div>

<div class="form-group {{ $errors->has('food') ? ' has-error' : '' }}">
											<label for="accommodation">Does food available?</label>
											<select  class="form-control" id="food" name="food" required>
<option value="0">No</option>
<option value="1">Yes</option>
</select>
											@if ($errors->has('food'))
												<span class="help-block">
													<strong>{{ $errors->first('food') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('food_types') ? ' has-error' : '' }} food-type">
											<label for="food_types">Type of Foods</label> <br>
											<label for="food_veg" class="fecilities-lbl"><input type="checkbox" id="food_veg" name="food_veg" class="fecilites-check"> Veg</label>
											<label for="food_non_veg" class="fecilities-lbl"><input type="checkbox" id="food_non_veg" name="food_non_veg" class="fecilites-check"> Non Veg</label>
									<label for="food_organic" class="fecilities-lbl"><input type="checkbox" id="food_organic" name="food_organic" class="fecilites-check"> Organic Food</label>
									<label for="food_personalised" class="fecilities-lbl"><input type="checkbox" id="food_personalised" name="food_personalised" class="fecilites-check"> Personalised Diet</label>
										</div>
										<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
											<label for="price">Price Category *</label>
											<select  class="form-control" id="price" name="price" required>
												<option value="">Select your price category</option>
												<option value="5">$$$$$</option>
												<option value="4">$$$$</option>
												<option value="3">$$$</option>
												<option value="2">$$</option>
												<option value="1">$</option>
								
											</select>
											@if ($errors->has('price'))
												<span class="help-block">
													<strong>{{ $errors->first('price') }}</strong>
												</span>
											@endif
										</div>

<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
											<label for="location">Choose location on map</label>
											
										</div>
										<div id="somecomponent" style="width: 500px; height: 400px; margin-left: -14px;margin-bottom: 14px;"></div>
										<input type="hidden" name="loc-lat" id="loc-lat">
										<input type="hidden" name="loc-lon" id="loc-lon">
										<input type="hidden" name="loc-add" id="loc-add">
										<input type="hidden" name="loc-rad" id="loc-rad">

										
										<div class="form-group {{ $errors->has('photo_1') ? ' has-error' : '' }}">
											<label for="photo_1">Photo 1 *</label>
											<input type="file" class="form-control" name="photo_1" id="photo_1" required value="{{ old('photo_1') }}">
											@if ($errors->has('photo_1'))
												<span class="help-block">
													<strong>{{ $errors->first('photo_1') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('photo_2') ? ' has-error' : '' }}">
											<label for="photo_2">Photo 2 </label>
											<input type="file" class="form-control" name="photo_2" id="photo_2" value="{{ old('photo_2') }}">
											@if ($errors->has('photo_2'))
												<span class="help-block">
													<strong>{{ $errors->first('photo_2') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('photo_3') ? ' has-error' : '' }}">
											<label for="photo_3">Photo 3</label>
											<input type="file" class="form-control" name="photo_3" id="photo_3" value="{{ old('photo_3') }}">
											@if ($errors->has('photo_3'))
												<span class="help-block">
													<strong>{{ $errors->first('photo_3') }}</strong>
												</span>
											@endif
										</div>
								
										<input type="hidden" name="type" value="2" />
										<div class="form-group">
											<input type="submit" value="Submit" class="lp-secondary-btn width-full btn-first-hover"> 
										</div>
									</form>
									
								<a class="md-close"><i class="fa fa-close"></i></a>
								</div>
								
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- ../section-row -->
	
	</section>
	
@endsection