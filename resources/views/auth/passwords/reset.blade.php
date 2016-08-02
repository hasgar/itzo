@extends('public.layouts.master')

@section('title', 'Reset Password - Chikitzo')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								ul>
									<li><a href="/">Home</a>
									</li>
									<li><a href="/auth">Login / Register</a></li>
									</li>

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
									<li><a href="/auth"><i class="fa fa-user-plus user-plus-icon"></i>  Login / Register</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="page-heading listing-page archive-page ">
			<div class="page-heading-inner-container text-center">
				<h1>Reset Password</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Reset Password</span></li>
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
								<div class="forgetpasswordcontainer">
									<h1 class="text-center">Reset Password</h1>
									<form class="form-horizontal margin-top-30"  role="form" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email">Email Address *</label>
											<input type="email" class="form-control" id="email" name="email" value="{{ $email or old('email') }}"/>
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
										</div>
					<div class="form-group {{ $errors->has('passowrd') ? ' has-error' : '' }}">
											<label for="password">Password *</label>
											<input type="password" class="form-control" id="password" name="passowrd"/>
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
										</div>
				<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
											<label for="password_confirmation">Confirm Password *</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation"/>
										@if ($errors->has('password_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
										@endif
										</div>
										<div class="form-group">
											<input type="submit" value="Send Password Reset Link" class="lp-secondary-btn width-full btn-first-hover" /> 
										</div>
									</form>	
									<div class="pop-form-bottom">
										<div class="bottom-links">
											<a class="cancelClick" >Cancel</a>
										</div>
									</div>
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