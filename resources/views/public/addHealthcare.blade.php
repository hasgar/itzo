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
									<h1 class="text-center">Add Health Care</h1>
									<form class="form-horizontal margin-top-30"role="form" method="POST" action="{{ url('/register') }}">
                       					 {{ csrf_field() }}
										<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name">Health Care Name *</label>
											<input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}">
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="supassword">Email Address *</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
											 @if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="sipassword">Password *</label>
											<input type="password" class="form-control" id="password" name="password">
											 @if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
											<label for="sipassword">Confirm Password *</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
											@if ($errors->has('password_confirmation'))
												<span class="help-block">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('treatment_type') ? ' has-error' : '' }}">
											<label for="treatment_type">Type of Treatment *</label>
											<select type="treatment_type" class="form-control" id="treatment_type" name="treatment_type">
<option value="0">Select your treatment type</option>
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
										<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
											<label for="price">Price Category *</label>
											<select type="price" class="form-control" id="price" name="price">
<option value="0">Select your price category</option>
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
										<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
											<label for="country">Country *</label>
											<select type="country" class="form-control" id="country" name="country">
<option value="0">Select your country</option>
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
										<div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
											<label for="state">State *</label>
											<select type="state" class="form-control" id="state" name="state">
<option value="0">Select your state</option>
</select>
											@if ($errors->has('state'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
											<label for="city">City *</label>
											<select type="city" class="form-control" id="city" name="city">
<option value="0">Select your city</option>
</select>
											@if ($errors->has('city'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
											<label for="address">Address *</label>
											<textarea type="address" class="form-control" name="address" id="address">{{ old('address') }}</textarea>
											@if ($errors->has('address'))
												<span class="help-block">
													<strong>{{ $errors->first('address') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('pin') ? ' has-error' : '' }}">
											<label for="pin">Pin *</label>
											<input type="pin" class="form-control" name="pin" id="pin" value="{{ old('pin') }}">
											@if ($errors->has('pin'))
												<span class="help-block">
													<strong>{{ $errors->first('pin') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
											<label for="mobile">Mobile *</label>
											<input type="mobile" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}">
											@if ($errors->has('mobile'))
												<span class="help-block">
													<strong>{{ $errors->first('mobile') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
											<label for="phone">Phone </label>
											<input type="phone" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
											@if ($errors->has('phone'))
												<span class="help-block">
													<strong>{{ $errors->first('phone') }}</strong>
												</span>
											@endif
										</div>
										
										<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
											<label for="description">About Healthcare</label>
											<textarea type="description" class="form-control" name="description" id="description">{{ old('description') }}</textarea>
											@if ($errors->has('description'))
												<span class="help-block">
													<strong>{{ $errors->first('description') }}</strong>
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