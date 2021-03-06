@extends('public.layouts.master')

@section('title', 'Book Health Care')


@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
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
				<h1>Book Health Care</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Book Health Care</span></li>
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
								 
								<h1 class="text-center">@if($status == 0) Error! @else Success! @endif</h1>
								<div class="alert @if($status == 1) alert-success @else alert-danger @endif margin-top-20">@if($status == 1) Your @if($type == 'password') password @else email @endif has been changed successfully! @else You entered wrong password @endif
</div>

									
									
<div class="pop-form-bottom">
										<div class="bottom-links" align="center">
											<a href="{{$back}}"><i class="fa fa-chevron-left"></i> Go back to dashboard</a>
										</div>
										
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