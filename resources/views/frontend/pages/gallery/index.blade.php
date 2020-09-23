  @extends('frontend.layouts.master')

  @section('content')

  
  	<!-- Top bar -->
	@include('frontend.layouts.includes.topbar')

	<!-- Navbar -->
	@include('frontend.layouts.includes.navbar')
    <!-- END nav -->

   
    
      <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Photo Gallery</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    }
    </section> 




				<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="container px-4">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="{{ asset('frontend/images/image_1.jpg') }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('frontend/images/course-1.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-plus"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{ asset('frontend/images/image_2.jpg') }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('frontend/images/image_2.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-plus"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{ asset('frontend/images/image_3.jpg') }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('frontend/images/image_3.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-plus"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{ asset('frontend/images/image_4.jpg') }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('frontend/images/image_4.jpg') }});">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-plus"></span>
    					</div>
						</a>
					</div>
        </div>
        </div>
    	</div>
    </section>
    
  @endsection