@extends('public.layouts.master')

@section('title', 'Sign Up - Chikitzo')


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
							<div class="login-form-popup lp-border-radius-8">

								<div class="siginupcontainer page-signup">
									<h1 class="text-center padding-top-15">Sign Up</h1>
									<form class="form-horizontal margin-top-30"role="form" method="POST" action="{{ url('/register') }}">
                       					 {{ csrf_field() }}
<div class="row">
										<div class="col-md-6  padding-left-0  form-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name">Full Name *</label>
											<input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
											@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group   padding-right-0 padding-left-40 col-md-6  {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="supassword">Email Address *</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
											 @if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div><div class="row">
										<div class="col-md-6  padding-left-0  form-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="sipassword">Password *</label>
											<input type="password" class="form-control" id="password" name="password" required>
											 @if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group   padding-right-0 padding-left-40 col-md-6  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
											<label for="sipassword">Confirm Password *</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
											@if ($errors->has('password_confirmation'))
												<span class="help-block">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
											@endif
										</div>
										</div><div class="row">
										<div class="form-group  col-md-6  padding-left-0  {{ $errors->has('mobile') ? ' has-error' : '' }}">
											<label for="mobile">Mobile Number</label>
											<div class="col-md-3" style="
    padding-top: 30px;
    padding-left: 0px;
"><select class="form-control" id="country_code" name="country_code">
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
<input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" required> </div>
											 @if ($errors->has('mobile'))
												<span class="help-block">
													<strong>{{ $errors->first('mobile') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group  padding-right-0 padding-left-40 col-md-6  {{ $errors->has('country') ? ' has-error' : '' }}">
											<label for="country">Country *</label>
											<select type="country" class="form-control" id="country" name="country" required>
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
										</div><div class="row">
										<div class="form-group   col-md-6  padding-left-0 {{ $errors->has('state') ? ' has-error' : '' }}">
											<label for="state">State *</label>
											<select type="state" class="form-control" id="state" name="state" required>
<option value="">Select your state</option>
</select>
											@if ($errors->has('state'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group  padding-right-0 padding-left-40 col-md-6  {{ $errors->has('city') ? ' has-error' : '' }}">
											<label for="city">City *</label>
											<select type="city" class="form-control" id="city" name="city">
<option value="">Select your city</option>
</select>
											@if ($errors->has('city'))
												<span class="help-block">
													<strong>{{ $errors->first('country') }}</strong>
												</span>
											@endif
										</div>
										</div><div class="row">
										<input type="hidden" name="type" value="1" />
										<div class="form-group" align="center">

											<input type="submit" value="Register" class="lp-secondary-btn btn-first-hover" style="width:200px">
										</div>
									</form>
									<div class="pop-form-bottom">
										<div class="bottom-links">
											<a  href="/signin">Already have an account? Sign in</a><br>
												<a  href="/add-health-care">Register Health Care Provider</a>
											<a href="/password/reset" class="pull-right" >Forgot Password</a>
										</div>

									</div>
								<a class="md-close"><i class="fa fa-close"></i></a>
								</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- ../section-row -->

	</section>

@endsection
