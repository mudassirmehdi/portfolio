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
            <h1 class="mb-2 bread">About Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url({{ asset('frontend/images/about.jpg') }}); border"></div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">Jinnah College Stablished Since 2016</h2>
						<p>Piplan is a Tehsil in Mianwali District in Punjab, situated at nearly a distance of 52 KM from the district capital Mianwali in the north. Jinnah College Piplan is a beginning of a new era of educational revolution in the area. Our unique plan IQ & EQ embodied with its deep focus on personality development is very much liked by people of the locality. Since Piplan has always been a hub of sports activities for the surrounding areas. </p> 
            <p>The sports include cricket, volleyball, badminton, tug of war, wrestling, hockey, and football, Jinnah College is developing all these sports potentials into personal identity of the sports lovers. We teach our students team building through sports and tours and life wisdom through our co-curricular activities.</p>
            <p> We believe that only by channelizing energies into right direction, we can develop a generation of superheroes. Our graduates can write their own destiny and add value in the lives of others. This perfect blend of academics and life training is making Jinnah College the first choice of people in Piplan.</p>
					</div>
				</div>
			</div>
		</section>
		

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2 d-flex">
    			<div class="col-md-6 align-items-stretch d-flex">
    				<div class="img img-video d-flex align-items-center" style="background-image: url({{ asset('frontend/images/about-2.jpg') }});">
    					<div class="video justify-content-center">
								<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<span class="ion-ios-play"></span>
		  					</a>
							</div>
    				</div>
    			</div>
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4">Few Word About Jinnah College</h2>
            <p>We are living in the age of science and technology but Tehsil Piplan was deprived of such an ideal institute before its establishment. This noble institute was established in April 2016. The main purpose of this institute is to impart scientific education in this area.</p>
            <p>With the mercy of Allah since the beginning, the best and competent teachers have been appointed and by the dint of their day and night struggle, the institute is showing magnificent results.</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-12">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="401">0</strong>
		                <span>Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Courses</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="50">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>

        <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Our ACHIEVEMENTS</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              @if(count($achievements) > 0)
              @foreach( $achievements as $achievement )
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('/uploads/achievements/{{ $achievement->student_picture }}')">
                  </div>
                  <div class="text ml-2">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span> 
                    <p>{{ \Str::limit($achievement->student_description, 120) }}</p>
                    <p class="name">{{ $achievement->student_name }}</p>
                    <span class="position">{{ $achievement->student_field }}</span>
                  </div>
                </div>
              </div>
              @endforeach

              @else 
                <div class="row text-center">
                  <div class="col-md-12">Soon will be available...</div>
                </div>
              @endif 


            </div>
          </div>
        </div>
      </div>
    </section>



    
  @endsection