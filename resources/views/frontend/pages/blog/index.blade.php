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
            <h1 class="mb-2 bread">Our Latest News</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ url('/blog') }}.html">Blog <i class="ion-ios-arrow-forward"></i></a></span></p>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">

          @if(count($posts) > 0 )
          @foreach( $posts as $post )
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="{{ route('blog.detail', $post->id ) }}" class="block-20 d-flex align-items-end" style="background-image: url('/uploads/posts/{{ $post->post_thumbail }}');">
								<div class="meta-date text-center p-2">
                  <span class="day">{{ $post->first()->created_at->format('d') }}</span>
                  <span class="mos">{{ $post->first()->created_at->format('M') }}</span>
                  <span class="yr">{{ $post->first()->created_at->format('Y') }}</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="{{ route('blog.detail', $post->id ) }}">{{ $post->post_title }}</a></h3>
                <p>{!! \Str::limit($post->post_description, 200) !!}</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="{{ route('blog.detail', $post->id ) }}" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">{{ $post->user()->first()->name }}</a> 
	                </p>
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
			</div>
		</section>


    
  @endsection