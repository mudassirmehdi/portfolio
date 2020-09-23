  @extends('backend.layouts.master')

  @section('content')  
<!-- Side bar --> 
<div id="app">
  @include('backend.layouts.includes.sidebar')
<!--Sidebar End-->
  @include('backend.layouts.includes.navbar')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Achievements
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link " href="{{ url('admin/achievements') }}">
                            <i class="icon icon-home2"></i>All Achievements</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="#"><i class="icon icon-plus-circle mb-3"></i>Edit Achievement</a>
                    </li> 
                </ul> 
            </div>
        </div>
    </header>


    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent"> 
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
              <div class="row my-3">
                <div class="col-md-12">
                   @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                </div>
              </div>
                <div class="row my-3">
                  <div class="col-md-8">
                    <!-- Basic Validation -->
                    <div class="card mb-3 shadow no-b r-0">
                       
                        <div class="card-body">
                          <form method="POST" action="{{ route('update.achievement', $achievement->id) }}"  enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Student Name *</label>
                                  <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" value="{{ $achievement->student_name }}">
                                  @error('student_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Student Field *</label>
                                    <input type="text" name="student_field" class="form-control @error('student_field') is-invalid @enderror" value="{{ $achievement->student_field }}">
                                    @error('student_field')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                              </div>
                            </div>                           

                            <div class="form-group">
                              <label>Student Description *</label>
                              <textarea rows="4" name="student_description" class="form-control @error('student_description') is-invalid @enderror">{{ $achievement->student_description }}</textarea>
                              @error('student_description')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>  

                             <div class="form-group"> 
                             <input type="file" name="student_picture" onchange="readURL(this);">
                             @error('student_picture')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </form>
                        </div>
                    </div> 
                </div>

                <div class="col-md-4">
                  <div class="card text-center">
                    <div class="card-header">
                      <h4>Image Preview</h4>
                    </div>
                    <div class="card-body">
                      <img src="/uploads/achievements/{{ $achievement->student_picture }}" style="width: 150px; height: 150px; border: 6px solid #2979ff;"  id="blah" class="rounded-circle img-fluaid" >  
                    </div>
                  </div>
                </div>


                </div>  
            </div> 
        </div>
    </div>
</div>







    
  @endsection