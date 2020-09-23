  @extends('backend.layouts.master')

  @section('content')  
<!-- Side bar --> 
<div id="app">
  @include('backend.layouts.includes.sidebar')
<!--Sidebar End-->
  @include('backend.layouts.includes.navbar')

<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Settings
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Admin Profile</a>
                    </li> 
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
              <div class="row">
                <div class="col-md-12">
                   @if(Session::has('success'))
                    <div class="alert alert-success">
                        <strong>Success: </strong>{{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            <strong>Error: </strong>{{ Session::get('error') }}
                        </div>
                    @endif
                </div>
              </div>
               <div class="row">
                  <div class="col-md-8">
                    <!-- Basic Validation -->
                    <div class="card mb-3 shadow no-b r-0">
                       
                        <div class="card-body">
                          <form method="POST" action="{{route('update.profile',[auth()->user()->id])}}"  enctype="multipart/form-data">

                            @csrf                           

                           <div class="row">
                           	<div class="col-md-6">
                           		<div class="form-group">
                           			<label>Name</label>
                           			<input type="text" name="name" placeholder="Name" class="form-control" value="{{ Auth()->user()->name }}">
                           		</div>
                           	</div>
                           	<div class="col-md-6">
                           		<div class="form-group">
                           			<label>User Name</label>
                           			<input type="text" name="user_name" placeholder="User Name" class="form-control" value="{{ Auth()->user()->user_name }}">
                           		</div>
                           	</div>
                           </div>  

                           <div class="form-group">
                           	<label>Email</label>
                           	<input type="email" name="email" placeholder="Email" class="form-control" value="{{ Auth()->user()->email }}">
                           </div>                     

                             <div class="form-group"> 
                             <input type="file" name="profile_image" value="{{ Auth::user()->profile_image }}" onchange="readURL(this);">
                             @error('teacher_profile')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                           <br>
                            <div class="card" style="border: none; box-shadow: 0px 0px 20px 0px lightgrey;">
                            	<div class="card-body">
                            		<div class="row">
                            			<div class="col-md-6">
                            				<div class="form-group">
                            					<label>Change Password</label>
                            					<input type="password" name="password" placeholder="Change Password" class="form-control">
                            				</div>
                            			</div>

                            			<div class="col-md-6">
                            				<div class="form-group">
                            					<label>Confirm Password</label>
                            					<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </form>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4">
                  <div class="card" style="border: none; box-shadow: 0px 0px 20px 0px lightgrey;">
                    <div class="card-header">
                      <h4>Image Preview</h4>
                    </div>
                    <div class="card-body text-center">
                    	@if(!empty(Auth::user()->profile_image))
		                    <img src="/uploads/profiles/{{ Auth::user()->profile_image }}" style="width: 150px; height: 150px; border: 6px solid #2979ff;"  id="blah" class="rounded-circle img-fluaid" >
			                @else
			                    <img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg" style="width: 150px; height: 150px; border: 6px solid #2979ff;"  id="blah" class="rounded-circle img-fluaid" >	
			                @endif
                     
                      <br><br>
                      <h3 style="font-weight: bold; letter-spacing: 1px; font-size: 30px;" >{{ Auth()->user()->name }}</h3>
                      <p>{{ Auth()->user()->email }}</p>
                    </div>
                  </div>
                </div>


                </div> 
            </div> 
        </div>
    </div> 
</div>






    
  @endsection