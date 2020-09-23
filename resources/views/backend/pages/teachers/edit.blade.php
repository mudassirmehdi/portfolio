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
                        Teachers
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Edit Teachers</a>
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
                   @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                </div>
              </div>
               <div class="row">
                  <div class="col-md-8">
                    <!-- Basic Validation -->
                    <div class="card mb-3 shadow no-b r-0">
                       
                        <div class="card-body">
                          <form method="POST" action="{{route('update.teacher',$teacher->id)}}"  enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Teacher Name *</label>
                                  <input type="text" name="teacher_name" class="form-control @error('teacher_name') is-invalid @enderror" value="{{ $teacher->teacher_name }}">
                                  @error('teacher_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Teacher Email *</label>
                                    <input type="email" name="teacher_email" class="form-control" value="{{ $teacher->teacher_email }}">
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                              <label>Teacher Position *</label>
                              <input type="text" name="teacher_position" class="form-control @error('teacher_position') is-invalid @enderror" value="{{ $teacher->teacher_position }}">
                               @error('teacher_position')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                              <label>Teacher Education *</label>
                              <input type="text" name="teacher_education" class="form-control @error('teacher_education') is-invalid @enderror" value="{{ $teacher->teacher_education }}">
                              @error('teacher_education')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                              </div>
                            </div>                           

                            <div class="form-group">
                              <label>Teacher Description *</label>
                              <textarea rows="4" name="teacher_description" class="form-control">{{ $teacher->teacher_description }}</textarea>
                            </div> 

                            <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Facebook Link *</label>
                                   <input type="text" name="facebook_handler" class="form-control" value="{{ $teacher->facebook_handler }}">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Twitter Link *</label>
                                   <input type="text" name="twitter_handler" class="form-control" value="{{ $teacher->twitter_handler }}">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Instagram Link *</label>
                                   <input type="text" name="instagram_handler" class="form-control" value="{{ $teacher->instagram_handler }}">
                                  </div>
                              </div>
                            </div>                            

                             <div class="form-group"> 
                             <input type="file" name="teacher_profile" onchange="readURL(this);">
                             @error('teacher_profile')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Changes</button>
                          </form>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Image Preview</h4>
                    </div>
                    <div class="card-body">
                      @if(!empty( $teacher->teacher_profile ))
                      <img src="/uploads/teachers/{{ $teacher->teacher_profile }}" style="width: 100%; height: 100%;" id="blah">
                      @else
                      <img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg" style="width: 100%; height: 100%;" id="blah">   
                      @endif 
                    </div>
                  </div>
                </div>


                </div> 
            </div> 
        </div>
    </div> 
</div>






    
  @endsection