@extends('public.layouts.master')

@section('title', 'Add Health Care - Chikitzo')


@section('addition_css')

<link href="/css/bootstrap-tagsinput.css" type="text/css" rel="stylesheet" />


@endsection

@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">



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
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>

		<div class="lp-section-row aliceblue">
			<div class="lp-section-content-container-one">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="login-form-popup lp-border-radius-8" style="
    WIDTH: 600px;
">

								<div class="siginupcontainer page-signup">
									<h1 class="text-center healthcare-heading">Register Health care Provider</h1>
									<form id="add-healthcare" class="form-horizontal margin-top-30" role="form" method="POST" action="{{ url('/register') }}" enctype='multipart/form-data'>
<fieldset id="add-healthcare-form">
										   					 {{ csrf_field() }}
										<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name">Name of Health care Provider *</label>
											<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter Health care Provider name">
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email">Email Address *</label>
											<input type="email" class="form-control healthcare-email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter official email" required>
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
											<label for="treatment_type">Type of Treatment available*</label>
											<?php $i = 1; ?>
@foreach ($types as $type)

											<select class="form-control treatment-type-{{ $i }} margin-top-7 @if($i != 1) hide-type @endif" id="treatment_type_{{$i}}" name="treatment_type_{{$i}}" required>
<option value="">Select Type of Treatments available</option>
										@foreach ($types as $type)
										<option value="{{$type['id']}}">{{$type['name']}}</option>
										@endforeach
</select>
<?php $i++ ?>
@endforeach
											@if ($errors->has('treatment_type'))
												<span class="help-block">
													<strong>{{ $errors->first('treatment_type') }}</strong>
												</span>
											@endif
											<div class="add-type"><i class="fa fa-plus"></i> Add More</div>
										</div>

										<div class="form-group {{ $errors->has('twentyfourseven') ? ' has-error' : '' }}">
											<label for="twentyfourseven">Is your working hours 24 x 7?</label>
											<select  class="form-control" id="twentyfourseven" name="twentyfourseven">
											<option value="0">No</option>
										<option value="1" selected="">Yes</option>
										</select>
											@if ($errors->has('twentyfourseven'))
												<span class="help-block">
													<strong>{{ $errors->first('twentyfourseven') }}</strong>
												</span>
											@endif
										</div>
<div class="working-hours"  style="display:none">
											<div class="form-group  {{ $errors->has('working_hours') ? ' has-error' : '' }}">
											<label for="working_hours">Working Hours ?</label>
									 </div>



										<div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  class="form-control" disabled></div>
											 <option value="Monday to Saturday">Monday</option>
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
											 <div class="col-md-3 no-right-padding"><select  class="form-control"  name="working_hours_mon_to" id="working_hours_mon_to"  required>
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

										 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  disabled class="form-control"></div>
											 <option value="Monday to Saturday">Tuesday</option>
											 </select>
											 </div>
											 <div class="col-md-3"><select  class="form-control" name="working_hours_tue_from" id="working_hours_tue_from" required>
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
											 <div class="col-md-3 no-right-padding"><select   class="form-control" name="working_hours_tue_to" id="working_hours_tue_to"  required>
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

										 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  disabled class="form-control"></div>
											 <option value="Monday to Saturday">Wednesday</option>
											 </select>
											 </div>
											 <div class="col-md-3"><select  class="form-control" name="working_hours_wed_from" id="working_hours_wed_from" required>
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
											 <div class="col-md-3 no-right-padding"><select   class="form-control" name="working_hours_wed_to" id="working_hours_wed_to"  required>
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

										 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  disabled class="form-control"></div>
											 <option value="Monday to Saturday">Thursday</option>
											 </select>
											 </div>
											 <div class="col-md-3"><select  class="form-control" name="working_hours_thu_from" id="working_hours_thu_from" required>
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
											 <div class="col-md-3 no-right-padding"><select  class="form-control" name="working_hours_thu_to" id="working_hours_thu_to"  required>
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

										 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  disabled class="form-control"></div>
											 <option value="Monday to Saturday">Friday</option>
											 </select>
											 </div>
											 <div class="col-md-3"><select  class="form-control" name="working_hours_fri_from" id="working_hours_fri_from" required>
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
											 <div class="col-md-3 no-right-padding"><select  class="form-control" name="working_hours_fri_to" id="working_hours_fri_to"  required>
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

										 <div class="form-group {{ $errors->has('working_hours_mon') ? ' has-error' : '' }}">
											 <div class="col-md-6 no-left-padding" ><select  disabled class="form-control"></div>
											 <option value="Monday to Saturday">Saturday</option>
											 </select>
											 </div>
											 <div class="col-md-3"><select  class="form-control" name="working_hours_sat_from" id="working_hours_sat_from" required>
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
											 <div class="col-md-3 no-right-padding"><select  class="form-control" name="working_hours_sat_to" id="working_hours_sat_to"  required>
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
											<div class="col-md-6 no-left-padding" ><select disabled class="form-control"></div>
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


										<div class="form-group {{ $errors->has('accreditation') ? ' has-error' : '' }}">
											<label for="accreditation">Accreditation</label> <br>
											<label for="nabh" class="fecilities-lbl"><input type="checkbox" id="nabh" name="nabh" value="1" class="fecilites-check"> NABH</label>
											<label for="iso" class="fecilities-lbl"><input type="checkbox" id="iso"  value="1" name="iso" class="fecilites-check"> ISO</label>
									<label for="ohsas" class="fecilities-lbl"><input type="checkbox" id="ohsas" value="1" name="ohsas" class="fecilites-check"> OHSAS</label>
									<label for="jci" class="fecilities-lbl"><input type="checkbox" id="jci" value="1" name="jci" class="fecilites-check"> JCI</label>
									<label for="nabl" class="fecilities-lbl"><input type="checkbox" id="nabl" value="1" name="nabl" class="fecilites-check"> NABL</label>
										</div>

										<div class="form-group {{ $errors->has('departments') ? ' has-error' : '' }}">
											<label for="departments">Departments / Services * </label>
											<input type="text" class="form-control" id="departments" name="departments" value="{{ old('departments') }}" placeholder="Enter departments" required>
											 @if ($errors->has('departments'))
												<span class="help-block">
													<strong>{{ $errors->first('departments') }}</strong>
												</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}"   required>
											<label for="country">Country *</label>
											<select  class="form-control" id="country" name="country">
<option value="101">India</option>
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
<option value="19">Kerala</option>
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
<option value="1947">Kozhikode</option>
</select>
											@if ($errors->has('city'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('area') ? ' has-error' : '' }}"   required>
											<label for="area">Town / Village *</label>
											<input type="text" class="form-control" name="area" id="area"  value="{{ old('area') }}" placeholder="Enter town / village" ></input>

											@if ($errors->has('area'))
												<span class="help-block">
													<strong>{{ $errors->first('area') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
											<label for="address">Address </label>
											<textarea class="form-control" name="address" id="address" placeholder="Enter your healthcare center address" >{{ old('address') }}</textarea>
											@if ($errors->has('address'))
												<span class="help-block">
													<strong>{{ $errors->first('address') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('pin') ? ' has-error' : '' }}">
											<label for="pin">Pin </label>
											<input type="text" class="form-control" min="0" name="pin" id="pin"  value="{{ old('pin') }}" placeholder="Enter health center Pin code" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
											@if ($errors->has('pin'))
												<span class="help-block">
													<strong>{{ $errors->first('pin') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('contact_name') ? ' has-error' : '' }}">
											<label for="contact_name">Contact Person Name *</label>
											<input type="text" class="form-control" name="contact_name" required id="contact_name" placeholder="Enter contact person name" value="{{ old('contact_name') }}">
											@if ($errors->has('contact_name'))
												<span class="help-block">
													<strong>{{ $errors->first('contact_name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('contact_email') ? ' has-error' : '' }}">
											<label for="contact_email">Contact Person Email *</label>
											<input type="text" class="form-control" name="contact_email" required id="contact_email" placeholder="Enter contact person email" value="{{ old('contact_email') }}">
											@if ($errors->has('contact_email'))
												<span class="help-block">
													<strong>{{ $errors->first('contact_email') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group  padding-left-0  {{ $errors->has('mobile') ? ' has-error' : '' }}">
											<label for="mobile">Mobile Number *</label>
											<div class="col-md-3" style="
    padding-top: 30px;
    padding-left: 0px;
"><select class="form-control" id="country_code_mobile" name="country_code_mobile" >
<option value="91">+91 (IND)</option>
<option value="974">+974 (QAT)</option>
<option value="971">+971 (UAE)</option>
<option value="966">+966 (KSA)</option>
<option value="968">+968 (OMA)</option>
<option value="965">+965 (KWT)</option>
<option value="973">+973 (BAH)</option>

</select></div><div class="col-md-9" style="
    padding-left: 0px; padding-right: 0px;
">
<input type="text" min="0" class="form-control" id="mobile" placeholder="Enter health care mobile number" name="mobile" value="{{ old('mobile') }}" required> </div>
											 @if ($errors->has('mobile'))
												<span class="help-block">
													<strong>{{ $errors->first('mobile') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
											<label for="phone">Phone</label>
											<div class="col-md-3" style="
    padding-top: 30px;
    padding-left: 0px;
"><select class="form-control" id="country_code_phone" name="country_code_phone">
<option value="91">+91 (IND)</option>
<option value="974">+974 (QAT)</option>
<option value="971">+971 (UAE)</option>
<option value="966">+966 (KSA)</option>
<option value="968">+968 (OMA)</option>
<option value="965">+965 (KWT)</option>
<option value="973">+973 (BAH)</option>

</select></div><div class="col-md-9" style="
    padding-left: 0px; padding-right: 0px;
">
											<input type="text" min="0"  class="form-control" name="phone" required id="phone" placeholder="Enter health center phone number" value="{{ old('phone') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
											@if ($errors->has('phone'))
												<span class="help-block">
													<strong>{{ $errors->first('phone') }}</strong>
												</span>
											@endif
										</div>
										</div>
										<div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
											<label for="fax">Fax</label>
											<div class="col-md-3" style="
    padding-top: 30px;
    padding-left: 0px;
"><select class="form-control" id="country_code_fax" name="country_code_fax">
<option value="91">+91 (IND)</option>
<option value="974">+974 (QAT)</option>
<option value="971">+971 (UAE)</option>
<option value="966">+966 (KSA)</option>
<option value="968">+968 (OMA)</option>
<option value="965">+965 (KWT)</option>
<option value="973">+973 (BAH)</option>

</select></div><div class="col-md-9" style="
    padding-left: 0px; padding-right: 0px;
">
											<input  type="text" min="0" class="form-control" name="fax"  id="fax" value="{{ old('fax') }}" placeholder="Enter Health center fax">
											@if ($errors->has('fax'))
												<span class="help-block">
													<strong>{{ $errors->first('fax') }}</strong>
												</span>
											@endif
										</div></div>
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
											<label for="fecilities">Available services and facilities</label> <br>
											<label for="fec-lab" class="fecilities-lbl"><input type="checkbox" id="fec-lab" name="fec-lab" class="fecilites-check" value="1"> Lab</label>
											<label for="fec-parking" class="fecilities-lbl"><input type="checkbox" id="fec-parking" name="fec-parking" class="fecilites-check" value="1"> Parking</label>
									<label for="fec-pharmacy" class="fecilities-lbl"><input type="checkbox" id="fec-pharmacy" name="fec-pharmacy" class="fecilites-check" value="1"> Pharmacy</label>
									<label for="fec-wheelchair" class="fecilities-lbl"><input type="checkbox" id="fec-wheelchair" name="fec-wheelchair" class="fecilites-check" value="1"> Wheelchair Access</label>
									<label for="fec-ambulance" class="fecilities-lbl"><input type="checkbox" id="fec-ambulance" name="fec-ambulance" class="fecilites-check" value="1"> Ambulance</label>
									<label for="fec-inpatient" class="fecilities-lbl"><input type="checkbox" id="fec-inpatient" name="fec-inpatient" class="fecilites-check" value="1"> Inpatient</label>
									<label for="fec-bloodbank" class="fecilities-lbl"><input type="checkbox" id="fec-bloodbank" name="fec-bloodbank" class="fecilites-check" value="1"> Blood Bank</label>
									<label for="fec-fitnesscentre" class="fecilities-lbl"><input type="checkbox" id="fec-fitnesscentre" name="fec-fitnesscentre" class="fecilites-check" value="1"> Fitness Centre</label>
									<label for="fec-canteen" class="fecilities-lbl"><input type="checkbox" id="fec-canteen" name="fec-canteen" class="fecilites-check" value="1" > Food/Canteen</label>
									<label for="fec-insurance" class="fecilities-lbl"><input type="checkbox" id="fec-insurance" name="fec-insurance" class="fecilites-check" value="1"> Insurance</label>
										</div>

										<div class="form-group {{ $errors->has('other_fecilities') ? ' has-error' : '' }}">
											<label for="other_fecilities">Any other facilities available?</label>
											<input type="text" class="form-control" name="other_fecilities"  id="other_fecilities" value="{{ old('other_fecilities') }}" placeholder="Enter Other facilities avilable">

											@if ($errors->has('other_fecilities'))
												<span class="help-block">
													<strong>{{ $errors->first('other_fecilities') }}</strong>
												</span>
											@endif
										</div>


										<div class="form-group {{ $errors->has('payment') ? ' has-error' : '' }}">
											<label for="payment">Payment Modes</label> <br>
											<label for="pay-cash" class="fecilities-lbl"><input type="checkbox" id="pay-cash" name="pay-cash" value="1" class="fecilites-check"> Cash</label>
											<label for="pay-creditcard" class="fecilities-lbl"><input type="checkbox" id="pay-creditcard"  value="1" name="pay-creditcard" class="fecilites-check"> Credit Card</label>
									<label for="pay-debitcard" class="fecilities-lbl"><input type="checkbox" id="pay-debitcard" value="1" name="pay-debitcard" class="fecilites-check"> Debit Card</label>
									<label for="pay-cheque" class="fecilities-lbl"><input type="checkbox" id="pay-cheque" value="1" name="pay-cheque" class="fecilites-check"> Cheque</label>
										</div>

										<div class="col-md-6" style="padding-left:0px;">
										<div class="form-group {{ $errors->has('no_of_beds') ? ' has-error' : '' }}">
											<label for="no_of_beds">Number of beds </label>
											<input type="number" min="0"  class="form-control" id="no_of_beds" name="no_of_beds" value="{{ old('no_of_beds') }}" placeholder="Enter No of beds">
											 @if ($errors->has('no_of_beds'))
												<span class="help-block">
													<strong>{{ $errors->first('no_of_beds') }}</strong>
												</span>
											@endif
										</div></div><div class="col-md-6" style="padding-right:0px;padding-left:30px">
											<div class="form-group {{ $errors->has('bed_range') ? ' has-error' : '' }}">
												<label for="bed_range">Bed range</label>
												<select  class="form-control" id="bed_range" name="bed_range">
											<option value="0-50" data-from="0" data-to="50">0-50</option>
											<option value="51-100" data-from="51" data-to="100">51-100</option>
											<option value="101-200" data-from="101" data-to="200">101-200</option>
											<option value="201-300" data-from="201" data-to="+">201-300</option>
											<option value="300+" data-from="0" data-to="50">300+</option>
											</select>
												@if ($errors->has('bed_range'))
													<span class="help-block">
														<strong>{{ $errors->first('bed_range') }}</strong>
													</span>
												@endif
											</div>
</div>

										<div class="form-group {{ $errors->has('food_types') ? ' has-error' : '' }} food-type">
											<label for="food_types">Type of Foods</label> <br>
											<label for="food_veg" class="fecilities-lbl"><input type="checkbox" value="1" id="food_veg" name="food_veg" class="fecilites-check"> Veg</label>
											<label for="food_non_veg" class="fecilities-lbl"><input type="checkbox" value="1" id="food_non_veg" name="food_non_veg" class="fecilites-check"> Non Veg</label>
									<label for="food_organic" class="fecilities-lbl"><input type="checkbox" value="1" id="food_organic" name="food_organic" class="fecilites-check"> Organic Food</label>
									<label for="food_personalised" class="fecilities-lbl"><input type="checkbox" value="1" id="food_personalised" name="food_personalised" class="fecilites-check"> Personalised Diet</label>
										</div>
										<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
											<label for="category">Select Health Care Provider category</label>
											<select  class="form-control" id="category" name="category" required>
												<option value="1">Clinic</option>
												<option value="2">Mini Hospital</option>
												<option value="3">Hospital / General</option>
												<option value="4">Speciality</option>
												<option value="5">Multi Speciality</option>

											</select>
											@if ($errors->has('category'))
												<span class="help-block">
													<strong>{{ $errors->first('category') }}</strong>
												</span>
											@endif
										</div>



<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
											<label for="location">Choose location on map</label>

										</div>
										<div class="form-group {{ $errors->has('loc-add') ? ' has-error' : '' }}">
										<input type="text" class="form-control margin-bottom-5" name="loc-add"  id="loc-add" value="{{ old('loc-add') }}" placeholder="Enter your city">

										<div id="somecomponent" style="width: 490px; height: 400px; margin-left: -14px;margin-bottom: 14px;margin-left:0px"></div>
										<input type="hidden" name="loc-lat" id="loc-lat">
										<input type="hidden" name="loc-lon" id="loc-lon">
										<input type="hidden" name="loc-rad" id="loc-rad">
</div>
								<div class="form-group {{ $errors->has('photos') ? ' has-error' : '' }}">
											<label for="photos">Choose Mutiple Photos * (Max :10mb, 50 files)</label>
											<input type="file" name="photos[]" multiple="" />
											@if ($errors->has('photos'))
												<span class="help-block">
													<strong>{{ $errors->first('photos') }}</strong>
												</span>
											@endif


										</div>
										<div class="form-group {{ $errors->has('payment_mode') ? ' has-error' : '' }}">
											<label for="payment_mode">Payment Mode for registration *</label>
											<select  class="form-control" id="payment_mode" name="payment_mode" required>
												<option value="">Select your payment mode</option>
												<option value="cheque">Cheque</option>
												<option value="dd">DD</option>
												<option value="net_banking">Net banking</option>
												<option value="other">Other</option>
											</select>
											@if ($errors->has('payment_mode'))
												<span class="help-block">
													<strong>{{ $errors->first('payment_mode') }}</strong>
												</span>
											@endif
										</div>


										<input type="hidden" name="type" value="2" />

										</fieldset>
										<div class="form-group">
											<input type="button"  value="Edit" id="edit-healthcare" style="display:none" class="lp-secondary-btn width-full btn-second-hover">
<br><br>
											<input type="submit"  value="Review" id="submit-healthcare" class="lp-secondary-btn width-full btn-first-hover">

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

@section('addition_scripts')

<script>
$( function() {
var availableTags = [
	"ACOUSTIC NEUROMA TREATMENT","ALLERGY","ANAESTHESIOLOGY","ARTHRALGIAS","ARTHRITIS TREATMENT","ASTHMA","AUDIOLOGY","AUDIOLOGY & SPEECH PATHOLOGY","AUTISM SPECTRUM DISORDERS","AVIATION MEDICINE","BACK PAIN","BEHAVIOR & LEARNING DISABILITY","BLOOD BANK & TRANSFUSION MEDICINE","BREAST SURGERY","CANCER SURGERY","CANCER TREATMENT","CARDIAC PHYSIOTHERAPY","CARDIOLOGY","CARDIOTHORACIC SURGERY","CARPAL TUNNEL SYNDROME","CATARACT CLINIC","CEREBRAL PALSY","CHILD & ADOLESCENT GUIDANCE","CLEANSING","CLINICAL PSYCHOLOGY","COCHLEAR IMPLANTATION","COMMUNITY MEDICINE","COMMUNITY OPHTHALMOLOGY","CONTACT LENS CLINIC","COSMETIC DERMATOLOGY","COSMETOLOGY","CRITICAL CARE MEDICINE","CRITICAL CARE NEUROSURGERY","CT SCAN","CUPPING","DE ADDICTION","DENTAL","DENTAL & FACIOMAXILLARY SURGERY","DERMATOLOGY","DHARA","DIABETOLOGY","DISC PROLAPSE","ELECTROPHYSIOLOGY","EMERGENCY MEDICINE","ENDOCRINE SURGERY","ENDOCRINOLOGY","ENDOSCOPIC SINUS SURGERY","ENT","EYE BANK","EYE CARE","GASTROENTEROLOGY","GASTROINTESTINAL SURGERY","GENERAL MEDICINE","GENERAL OPHTHALMOLOGY","GENERAL SURGERY","GERIATRIC","GLAUCOMA","GYNAECOLOGY","HAIR LOSS","HEAD & NECK","HEAD ACHE","HEARING IMPAIRMENT","HISTOPATHOLOGY","INFERTILITY TREATMENT","INTERNAL MEDICINE","JOINT REPLACEMENT & TRAUMATOLOGY","KALARI UZHICHIL","KERALA TRADITIONAL TREATMENTS","KIZHI","KNEE JOINT PAIN","LABORATORY SERVICE","LAPAROSCOPIC SURGERY","LASIK","LEECH THERAPY","LIFESTYLE DISEASES","LOW VISION CLINIC","MASSAGE","MAXILLOFACIAL SURGERY","MEDICAL ONCOLOGY","MEMORY ENHANCEMENT THERAPY","MENSTRUAL DISORDERS","MICROBIOLOGY","MIGRAINE","MRI","NASYAM","NAVARAKKIZHI","NECK PAIN","NEONATOLOGY","NEONATOLOGY AND PEDIATRICS","NEPHROLOGY","NEURO OPHTHALMOLOGY","NEURO SPINAL & RHEUMATOLOGICAL DISORDERS","NEUROLOGY","NEUROSURGERY","NUCLEAR MEDICINE","NUTRITION AND DIETARY","OBSTETRICS & GYNAECOLOGY","OCULOPLASTY","ONCOLOGY","OPHTHALMOLOGY","ORGAN TRANSPLANT","ORTHOPAEDICS","ORTHOPAEDICS & TRAUMATOLOGY","OSTEOARTHRITIS","PAIN & PALLIATIVE CARE","PAIN MEDICINE","PANCHAKARMA TREATMENTS","PATHOLOGY","PATHOLOGY & LABORATORY MEDICINE","PATHOLOGY AND MICROBIOLOGY","PEDIATRIC & SQUINT OPHTHALMOLOGY","PEDIATRIC CARDIOLOGY","PEDIATRIC NEURO SURGERY","PEDIATRIC SURGERY","PEDIATRICS","PHYSICAL MEDICINE & REHABILITATION","PILES AND FISTULA TREATMENT","PIZHICHIL","PLANTAR FASCIITIS","PLASTIC SURGERY","PSORIASIS TREATMENT","PSYCHIATRIC","PSYCHIATRY & BEHAVIOUR MEDICINE","PSYCHOLOGICAL DISORDERS","PSYCHOSOMATIC","PULMONOLOGY","RADIATION ONCOLOGY","RADIODIAGNOSIS AND IMAGING","RADIOLOGY & IMAGING","RECONSTRUCTIVE & HAND SURGERY","RECONSTRUCTIVE AND MICRO-VASCULAR SURGERY","REFRACTIVE SURGERY","REJUVENATION AND BEAUTY THERAPIES","REPRODUCTIVE MEDICINE AND LAPROSCOPIC SURGERY","RESEARCH","RESPIRATORY MEDICINE","RHEUMATOLOGY","SASTHRA KARMA","SEXUAL PROBLEMS","SIRODHARA","SIROLEPA","SIROVASTHI","SKIN AILMENTS","SKIN THERAPY","SLEEP ENDOSCOPY","SLEEP MEDICINE & CRITICAL CARE","SPECTACLES","SPONDYLOSIS","SPORTS MEDICINE","STEAM BATH","STRESS MANAGEMENT","STROKE & TRAUMA REHABILITATION","STROKE COMPLICATIONS","SURGERY","SURGICAL GASTROENTEROLOGY","SURGICAL ONCOLOGY","TB & CHEST","THYROPLASTY","TRIGEMINAL NEURALGIA","UROLOGY","UROLOGY & RENAL TRANSPLANTATION","UROLOGY AND TRANSPLANT SURGERY","UZHICHIL","VARICOSE VEIN","VASCULAR & ENDOVASCULAR SURGERY","VASCULAR SURGERY","VASTHI","VITREO RETINAL","WEIGHT MANAGEMENT","WOMEN'S HEALTH"
];
function split( val ) {
	return val.split( /,\s*/ );
}
function extractLast( term ) {
	return split( term ).pop();
}

$( "#departments" )
	// don't navigate away from the field on tab when selecting an item
	.on( "keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).autocomplete( "instance" ).menu.active ) {
			event.preventDefault();
		}
	})
	.autocomplete({
		minLength: 0,
		source: function( request, response ) {
			// delegate back to autocomplete, but extract the last term
			response( $.ui.autocomplete.filter(
				availableTags, extractLast( request.term ) ) );
		},
		focus: function() {
			// prevent value inserted on focus
			return false;
		},
		select: function( event, ui ) {
			var terms = split( this.value );
			// remove the current input
			terms.pop();
			// add the selected item
			terms.push( ui.item.value );
			// add placeholder to get the comma-and-space at the end
			terms.push( "" );
			this.value = terms.join( ", " );
			return false;
		}
	});

} );

</script>
@endsection
