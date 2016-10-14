@extends('public.layouts.master')

@section('title', 'Sign In - Chikitzo')


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
		<div class="page-heading listing-page archive-page ">
			<div class="page-heading-inner-container text-center">
				<h1>Sign In</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Sign In</span></li>
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
								<div class="siginincontainer">
									<h1 class="text-center">Sign In</h1>
									<form class="form-horizontal margin-top-30" role="form" method="POST" action="{{ url('/login') }}">
										{{ csrf_field() }}
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="siusername">Email Address *</label>
											<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
										</div>
										<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="password">Password *</label>
											<input type="password" class="form-control" id="password" name="password" required />
											@if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
										<div class="form-group">
											<div class="checkbox pad-bottom-10">
												<input id="check1" type="checkbox" name="remember">
												<label for="check1">Keep me signed in</label>
											</div>
										</div>
										
										<div class="form-group">
											<input type="submit" value="Sign in" class="lp-secondary-btn width-full btn-first-hover" /> 
										</div>
									</form>	
									<div class="pop-form-bottom">
										<div class="bottom-links">
											<a  href="/signup">Not a member? Sign up</a>
											<a  href="/password/reset" class="pull-right">Forgot Password</a>
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