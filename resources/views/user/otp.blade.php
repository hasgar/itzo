@extends('public.layouts.master')

@section('title', 'Enter OTP - Chikitzo')


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
								<div class="siginincontainer">
									<h1 class="text-center">Enter OTP</h1>
  									<p class="text-center">We just sent you an OTP to your mobile number</p>
                    @if (count($errors) > 0)
                    <ul class="error_points">
                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                      </blockquote>
                      @endif

									<form class="form-horizontal margin-top-30" role="form" method="POST" action="{{ url('/otpVerification') }}">
										{{ csrf_field() }}
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="otp">OTP *</label>
											<input type="text" class="form-control" id="otp" name="otp" value="{{ old('otp') }}" required />
										@if ($errors->has('otp'))
											<span class="help-block">
												<strong>{{ $errors->first('otp') }}</strong>
											</span>
										@endif
										</div>

										<div class="form-group">
											<input type="submit" value="Confirm" class="lp-secondary-btn width-full btn-first-hover" />
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
