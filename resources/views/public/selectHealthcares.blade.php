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
					<form class="form-inline clearfix" action="/healthcare/type/{{strtolower($name)}}" method="get" style="
							padding: 0px;
					">

						<input type="text" id="search" name="search" placeholder="Search healthcare" autocomplete="off" style="
						    padding: 17px;
						    width: 100%;
						">
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
			<?php
$row_i=0; ?>
					<div class="row lp-list-page-grid padding-top-50">
						<?php $fect = "" ?>
						@foreach ($healthcare as $health)
						@if($health['lab'] == 1)
        <?php $fect .= "8" ?>
		@endif
		@if($health['parking'] == 1)
        <?php $fect .= ",9" ?> @endif
		@if($health['pharmacy'] == 1)
        <?php $fect .= ",10" ?> @endif
        @if($health['wheelchair'] == 1)
        <?php $fect .= ",11" ?> @endif
        @if($health['ambulance'] == 1)
        <?php $fect .= ",12" ?> @endif
        @if($health['inpatient'] == 1)
        <?php $fect .= ",13" ?> @endif
        @if($health['bloodbank'] == 1)
        <?php $fect .= ",14" ?> @endif
        @if($health['fitness'] == 1)
        <?php $fect .= ",15" ?> @endif
        @if($health['yoga'] == 1)
        <?php $fect .= ",16" ?> @endif
        @if($health['massage'] == 1)
        <?php $fect .= ",17" ?> @endif
        @if($health['sports'] == 1)
        <?php $fect .= ",18" ?> @endif
        @if($health['insurance'] == 1)
        <?php $fect .= ",20" ?> @endif
        @if($health['tours'] == 1)
        <?php $fect .= ",19" ?> @endif
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer healthcare-box" data-fec="<?php echo $fect;
						$fect = ""; ?>" data-title="Photography" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$20/h" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.514070" data-longitute="-0.142292"  data-id="10"  data-posturl="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
											<img src="../../images/healthcare/{{ $health['pro_pic'] }}" alt="grid-3" />
										</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
											{{ $health['name'] }}
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>{{ $health['city'][0]['name'] }}</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="/healthcare/{{ $health['id'] }}/{{ urlencode($health['name']) }}">
											<!-- 5 Star Hotel icon by Icons8 -->
<img class="icon icons8-5-Star-Hotel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACWUlEQVRoQ+1ZvXnbMBB95zKN5REwQZQJAk0QuwxZRJnAHsEj2BNYKciUsScQNrAzAUZI0qQ0/IEy80E0IQIgKOhTwE68H9w7HN7hKMLAw79LrlXEZyb6VFPL25hoEEgt1w2Qgi16gSSW7wTCKznHCT5BYU7AuVZWwD0IT3jGQ2OcUC5K9tRNqnVHeC1XBHwxDRTwTRRsqd+lljsD0YqLWmrk71+Nfq4LNjcdpJabsew8I7ySvwjqz6a06FSU7Mw0Ti13AsJ/yBn+4kqU7LoppUpe4x1uxAX73fxOLHcqreawA5cAzokwG2K2fciVgk7gPYBbp8POK7kkwt0+ggtdQyl8FSVbWUtL7wQRHl/p9hYKqz70oQGMsWuqhLCkTaVAKXwwY9s67C2lKr19Bbsas/BUtryWNxqM2Qr0WttANEsRZl20UwUV4retGn1mTBbdArKopdLO1wUbvLqEBBHLpi9OJyC8ko9E2GqGbVD66iIKdtHpL5PqBwNpDW0Z7e7gvvTNdZ12xFZyh/T+/wRyDKWlp8OPfUCUwoMoWTOztM+illPrv2FXp9KKRZux/ASzVqwAYvkJBpL7iGULYvWd3EdsmTyE906sta8rh2+fCimtqfuCr//cR2K1gCh+ch85psPeOwLneaTzTSBGQnIf+ffxIc8j4UwcTL/hS05jGQwkzyN5HtlkwIeWvej3EOYOG0AvIGPmBZcMj/HvCmT0vDAAZLR/JyC+JOpT276+R5WW72IZiGPGghuio3/z26/XtT+G/+M+I74ZSqW/63OQlQZTBWtbt/t3xgvz/SNvFqVEmwAAAABJRU5ErkJggg==" alt="hotels">
										</a></li>
										<li><span>Price on call / email</span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
									@if(count($health['rating']) > 0)
										@for($i=0;$i<$health['rating'][0]['rating'];$i++)
										<i class="fa fa-star"></i>
										@endfor
										@for($k=$i;$k<5;$k++)
										<i class="fa fa-star-o"></i>
										@endfor
										<span class="rating-ratio">{{$health['rating'][0]['rating']}}</span>
								  @else
								   <span class="rating-ratio">Never rated</span>
								  @endif
									</div>
									<div class="pull-right">
										@for($i=0;$i<$health['price'];$i++)
										<i class="fa fa-usd price-usd"></i>
										@endfor
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<?php
						    $row_i++;
						    if ($row_i%4 == 0 ) echo '</div><div class="row lp-list-page-grid padding-top-50">';
						?>
						@endforeach





					</div>
		</div>
	</section>

@endsection
