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
				<h1>{{$type_sel['name']}}</h1>

			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>
		<div class="container page-container">
			<div class="row">
				<div class="col-md-12 search-row margin-top-subtract-35  margin-bottom-35">
					<form class="form-inline clearfix" action="/selectHealthcare" method="get" style="
							padding: 0px;
					">

					<input type="text" id="search" name="search" placeholder="Search healthcare" autocomplete="off" style="
							padding: 17px;
							width: 91%;
					"><button type="submit" class="lp-search-btn" style="  width: 60px;
	padding: 9px;
">
<i class="icons8-search lp-search-icon" style="position:inherit"></i>
</button>
					</form>
					</div>
					<?php if($search != "0") { ?>
					<p style="
    color: #d43737;
    padding-left: 20px;
">Search result for: <b><?php echo $search; ?></b></p>
<?php } ?>
			</div>
			<!-- <div class="row listing-page-result-row margin-bottom-25">
				<div class="col-md-4 col-sm-4 text-left">
					<p>10 Results</p>
				</div>
				<div class="col-md-4 col-sm-4  text-center">
					<p class="view-on-map">


					</p>
				</div>
				<div class="col-md-4 col-sm-4  text-right">
					<p>Showing all Hospital Listings <a href="/listing.html#" class="achor-color">Reset</a></p>
				</div>
			</div> -->
			<div class="mobile-map-space">

					<!-- Popup Open -->

					<div class="md-modal md-effect-3 mobilemap" id="modal-4">
						<div class="md-content mapbilemap-content">
							<div id='map' class="listingmap"></div>
							<a class="md-close mapbilemap-close"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<!-- Popup Close -->
					<div class="md-overlay md-overlayi"></div> <!-- Overlay for Popup -->
			</div>
					<div class="row lp-list-page-grid">



						<div align="center"> No Healthcare Found </div>


					</div>
		</div>
	</section>

@endsection
