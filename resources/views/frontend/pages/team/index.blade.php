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
            <h1 class="mb-2 bread">Certified Teacher</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Teacher <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    }
    </section>

    <section class="ftco-section bg-light">
			<div class="container px-4">
				<div class="row">
					@if( count($teachers) > 0)

					@foreach( $teachers as $teacher)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('/uploads/teachers/{{ $teacher->teacher_profile }}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>{{ $teacher->teacher_name }}</h3>
								<span class="position mb-2">{{ $teacher->teacher_education }}</span> 
								<div class="faded">
									 <ul class="ftco-social text-center">
									 	@if(!empty($teacher->twitter_handler))
						                <li class="ftco-animate"><a href="{{ $teacher->twitter_handler }}"><span class="icon-twitter"></span></a></li>@else @endif
                                        @if(!empty($teacher->facebook_handler))
						                <li class="ftco-animate"><a href="{{ $teacher->facebook_handler }}"><span class="icon-facebook"></span></a></li>@else @endif
                                        @if(!empty($teacher->instagram_handler))
						                <li class="ftco-animate"><a href="{{ $teacher->instagram_handler }}"><span class="icon-instagram"></span></a></li>@else @endif

						              </ul>
					             </div> 
							</div>
						</div>
					</div>

					@endforeach

					@else
                      <div class="col-md-12 text-center">
                      	<p>Soon will be available...</p>
                      </div>
					@endif

 
					 
					 
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ $teachers->links() }}
					</div>
				</div>
			</div>
		</section>
    
  @endsection