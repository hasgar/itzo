@extends('public.layouts.master')

@section('title', 'Book Health Care')


@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		 <!-- Overlay for Popup -->
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
								@if($done == 1) 
								<h1 class="text-center">Success!</h1>
								<div class="alert alert-success margin-top-20">Your booking has been made successfully!
</div>

									
									@else
									<h1 class="text-center">Book Health Care</h1>
									<form class="form-horizontal margin-top-30" role="form" method="POST" action="/booked">
										{{ csrf_field() }}
										<div class="form-group {{ $errors->has('dateOfBook') ? ' has-error' : '' }}">
											<label for="dateOfBook">Date of booking *</label>
											<input type="text" class="form-control" id="dateOfBook" name="dateOfBook" value="{{ old('dateOfBook') }}"/>
										@if ($errors->has('dateOfBook'))
											<span class="help-block">
												<strong>{{ $errors->first('dateOfBook') }}</strong>
											</span>
										@endif
										</div>
										<div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
											<label for="message">Message</label>
											<textarea type="message" class="form-control" id="message" name="message"/>{{ old('dateOfBook') }}</textarea>
											@if ($errors->has('message'))
												<span class="help-block">
													<strong>{{ $errors->first('message') }}</strong>
												</span>
											@endif
										</div>
										
										<input type="hidden" value="{{ $healthcare[0]['id'] }}" name="id" >
										<div class="form-group">
											<input type="submit" value="Book Now" class="lp-secondary-btn width-full btn-first-hover" /> 
										</div>
									</form>	
									<div class="pop-form-bottom">
										@endif

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