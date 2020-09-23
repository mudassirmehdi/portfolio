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
            <h1 class="mb-2 bread">{!! \Str::limit($post->post_title, 20) !!}</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ url('/blog') }}.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">{{ $post->post_title }}</h2>
           
            <p>
              <img src="/uploads/posts/{{ $post->post_thumbail }}" alt="" class="img-fluid">
            </p>
            <p>{!! $post->post_description !!}</p> 
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="/uploads/profiles/{{ $post->user()->first()->profile_image }}" alt="Image placeholder" class="img-fluid" style="width: 70px; height: 70px; border-radius: 50%; border: 4px solid #fd5f00">
              </div>
              <div class="desc">
                <h3>{{ $post->user()->first()->name }}</h3>
                <p>{{ $post->user()->first()->email }}</p>
              </div>
            </div>
           
                <div class="comment-form-wrap pt-5">
                <h3 class="mb-5 h4 font-weight-bold">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>

            <div class="pt-5 mt-5">
              <h3 class="mb-5 h4 font-weight-bold">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{ asset('frontend/images/teacher-1.jpg') }}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta mb-2">June 27, 2019 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
                </li>

             

                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{ asset('frontend/images/teacher-1.jpg') }}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta mb-2">June 27, 2019 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
          
            </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              @foreach($posts as $post )
              <div class="block-21 mb-4 d-flex">
                <a href="{{ route('blog.detail', $post->id ) }}" class="blog-img mr-4" style="background-image: url('/uploads/posts/{{ $post->post_thumbail }}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ route('blog.detail', $post->id ) }}">{!! \Str::limit($post->post_title, 20) !!}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{ $post->first()->created_at->format('M') }} {{ $post->first()->created_at->format('d') }}, {{ $post->first()->created_at->format('Y') }}</a></div>
                    <div><a href="#"><span class="icon-person"></span> {{ $post->user()->first()->name }}</a></div> 
                  </div>
                </div>
              </div>
              @endforeach 
            </div>  
          </div><!-- END COL -->
        </div>
			</div>
		</section>



      @endsection