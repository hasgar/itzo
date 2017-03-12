@extends('public.layouts.master')

@section('title', 'Payment Pending - Chikitzo')


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
									<h1 class="text-center">Payment Pending</h1>
  									<p class="text-center">You are now one step away from registering {{$name}} </p>
	  									<p class="text-center">Please pay Rs. {{$amount}} for subscribing to chikitzo from {{$date_from}} to {{$date_to}} </p>

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
