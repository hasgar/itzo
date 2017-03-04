@extends('public.layouts.master')

@section('title', 'About - Chikitzo')


@section('content')
<div id="page">
<header class="lp-header-bg">
		<div class="lp-header-overlay"></div> <!-- ../header-overlay -->





		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								@include('public.layouts.headerMob')
							</div>
		<div class="lp-menu-bar">
			<div class="container">
					<div class="row">
						@include('public.layouts.logo')

					</div>
				</div>
		</div><!-- ../menu-bar -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section class="clearfix">

		<div  class="padding-top-60 padding-bottom-70 contact-left width-100" align="center">
			<h3 class="lp-border-bottom padding-bottom-20 margin-bottom-20">About Us</h3>
			<div class="address-box mr-bottom-30" align="left" style="width:800px">
						<p>
              Chikitzo was formed with the aim of helping individuals find the right healthcare and be guided by the right professionals. We are a group of passionate healthcare consultants hailing from different academic backgrounds, and a common goal. Our aim is to create a solution in the healthcare industry that will enable an individual to assess and identify the right treatment for every ailment. We hope to ease the burden and costs involved during an individual’s medical visit, which is oftentimes stressful. Oftentimes, patients and their caretakers are reluctant in making their decisions to avail treatments outside their locality. People typically rely on common recommendations among their friends and relatives. Although, word-of-mouth helps in many cases, it is not always accurate and should not be the deciding factor for treating any ailment. This is where the Chikitzo team comes in handy!
            </p><p>  Chikitzo provides a digital platform that ensures a well-informed patient through transparency of information, and an open platform to express customer satisfaction.
						</p>
<b>Primary activities:</b>
<ul>
<li><b>Chikitzo Search</b> - An online portal offering a platform for patients and healthcare seekers to find the best healthcare around India (www.chikitzo.com). Chikitzo search provides a consolidated listing of health care providers across India. This includes all types of hospitals; clinics; medical centers; and wellness centers that offer treatments ranging from conventional medicine such as Allopathy, to alternative medicine such as Homeopathy; Ayurveda; Yoga & Naturopath; Unani; Siddha; Acupuncture & Chinese; and Psychology.
Our listings are filtered based on ratings; popular review, healthcare certifications, and other important criterion that will help the individual identify the appropriate healthcare.
</li>
<li><b>Chikitzo consultants</b> - The Chikitzo team can offer on-the-ground support for your medical visits across India. We can take care of all your medical interests during your visit. This includes travel arrangements, accommodations and medical appointments. We also organise corporate healthcare events, seminars, conferences and programs.
</li>
</ul>
<p>In line with the medical tourism vision of India, Chikitzo aims to promote international medical tourism across India. </p>
<p><u>Chikitzo LLC operates in accordance to MCI regulation 7.12<u></p>
    	</div>

	</section>

@endsection
