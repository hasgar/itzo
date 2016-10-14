@extends('public.layouts.master')

@section('title', 'Select your healthcare - Chikitzo')


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
				<h1>404</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Page Not Found</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>
		<div class="lp-section-row aliceblue text-center lp-section-content-container">
			<div class="container white mr-top-60 mr-bottom-60">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<h2 class="page-404-title pg-404-tit mr-top-0">4<img alt="" src="images/404.png" />4</h2>
						<p class="pg-404-p text-center padding-top-20"> Ooops, Ghost HERE ! </p>
					</div>	
				</div>	
				<div class="row">
					<div class="col-md-12 text-center pad-top-15 padding-bottom-30">
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<p>	
									The page you are looking for might have been removed.had its same changed.or its temporarily unavailable.
								</p>
							</div>		
						</div>		
					</div>		
				</div>		
			</div>
		</div>
	</section>
	
@endsection