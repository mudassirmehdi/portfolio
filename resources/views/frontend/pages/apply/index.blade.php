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
            <h1 class="mb-2 bread">Admission Open</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Admission <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		
			<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Admission</span> Form </h2> 
            <p>Fill the form given below to submit your request for admission in Jinnah School & College Piplan .<span class="text-danger">Note:</span> all star (*) fiels are require.</p>
          </div>
        </div>
				<div class="row">
          <div class="col-md-12 col-lg-12 ftco-animate">
             <form action="" method="" enctype=""> 
             	<div class="row">
             		<div class="col-md-12">
             			@if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
             		</div>
             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>Student Name <span class="text-danger">*</span></label>
             				<input type="text" name="student_name" class="form-control @error('name') is-invalid @enderror">
             				@error('student_name')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>Father Name <span class="text-danger">*</span></label>
             				<input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror">
             				@error('father_name')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>


             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>City/Address <span class="text-danger">*</span></label>
             				<input type="text" name="city_address" class="form-control @error('city_address') is-invalid @enderror">
             				@error('city_address')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-3">
             			<div class="form-group">
             				<label>B-Form <span class="text-danger">*</span></label>
             				<input type="number" name="b_form" class="form-control @error('b_form') is-invalid @enderror">
             				@error('b_form')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-3">
             			<div class="form-group">
             				<label>Date of Birth <span class="text-danger">*</span></label>
             				<input type="date" name="date_birth" class="form-control @error('date_birth') is-invalid @enderror">
             				@error('date_birth')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-3">
             			<div class="form-group">
             				<label>Mobile Number <span class="text-danger">*</span></label>
             				<input type="number" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror">
             				@error('mobile_number')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-3">
             			<div class="form-group">
             				<label>Whats App Number</label>
             				<input type="number" name="whatsapp_number" class="form-control">
             			</div>
             		</div>
                    
                    <div class="col-lg-4"> 
                      	 <div class="form-group">
             				<label>Gender <span class="text-danger">*</span></label>
             				<select name="gender" class="form-control @error('gender') is-invalid @enderror">
             					<option readonly>--Select--</option>
             					<option value="male">Male</option>
             					<option value="female">Female</option>
             				</select> 
             				@error('gender')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div> 
             		</div>

             		<div class="col-lg-4"> 
                      	 <div class="form-group">
             				<label>You are Admission For <span class="text-danger">*</span></label>
             				<select name="admission_for" class="form-control @error('admission_for') is-invalid @enderror">
             					<option readonly>--Select--</option>
             					<option value="Science">Science (if Addmission in 9th)</option>
             					<option value="Pre-Medical">Pre-Medical (if Addmission in 11th)</option>
             					<option value="Pre-Engineering">Pre-Engineering (if Addmission in 11th)</option>
             					<option value="ICS ">ICS (if Addmission in 11th)</option>
             					<option value="FA-IT ">FA-IT (if Addmission in 11th)</option>
             				</select> 
             				@error('admission_for')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div> 
             		</div>

             		<div class="col-lg-4"> 
                      	 <div class="form-group">
             				<label>Last Exam <span class="text-danger">*</span></label>
             				<select name="last_exam" class="form-control @error('last_exam') is-invalid @enderror">
             					<option readonly>--Select--</option>
             					<option value="8">8th</option>
             					<option value="10">10th</option>  
             				</select> 
             				@error('last_exam')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div> 
             		</div>

             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>Obtain Marks<span class="text-danger">*</span></label>
             				<input type="number" name="obtain_marks" class="form-control @error('obtain_marks') is-invalid @enderror">
             				@error('obtain_marks')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>Institute<span class="text-danger">*</span></label>
             				<input type="text" name="institute" class="form-control @error('institute') is-invalid @enderror">
             				@error('institute')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-4">
             			<div class="form-group">
             				<label>Exam Year<span class="text-danger">*</span></label>
             				<input type="number" name="institute" class="form-control @error('institute') is-invalid @enderror">
             				@error('institute')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-6">
             			<div class="form-group">
             				<label>Board<span class="text-danger">*</span></label>
             				<input type="text" name="board" class="form-control @error('board') is-invalid @enderror">
             				@error('board')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

             		<div class="col-lg-6">
             			<div class="form-group">
             				<label>Board Roll Number<span class="text-danger">*</span></label>
             				<input type="number" name="board_rollnumber" class="form-control @error('board_rollnumber') is-invalid @enderror">
             				@error('board_rollnumber')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             			</div>
             		</div>

                   <div class="col-lg-12 mt-3" style="display: inline-block;">
                   	<img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg" id="blah" style="width: 70px; height: 70px; border-radius: 50%; float: left; margin-right:30px; ">
             		<div class="form-group">
             			<label>Student Picture</label><br>
             			<input type="file" name="student_picture" class="student_picture @error('student_picture') is-invalid @enderror" onchange="readURL(this);">
             			@error('student_picture')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
             		</div>
             	   </div> 
             		<div class="form-group mt-4">
		                <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
		              </div>


             		


             	</div>
             </form>
          </div> 
         


        </div>
			</div>
		</section>
    
  @endsection