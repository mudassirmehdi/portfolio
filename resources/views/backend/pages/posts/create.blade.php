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
                        Posts
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Add Post</a>
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
                          <form method="POST" action="{{ route('add.post') }}"  enctype="multipart/form-data">

                            @csrf
 

                            <div class="form-group">
                                  <label>Post title *</label>
                                  <input type="text" name="post_title" class="form-control @error('post_title') is-invalid @enderror" value="{{ old('post_title') }}">
                                  @error('post_title')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>                          

                            <div class="form-group">
                              <label>Post Description *</label>
                              <textarea rows="4" name="ckeditor" id="ckeditor" class="ckeditor form-control @error('ckeditor') is-invalid @enderror">{{ old('ckeditor') }}</textarea>
                              @error('ckeditor')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div> 

                                                      

                             <div class="form-group"> 
                             <input type="file" name="post_thumbail" onchange="readURL(this);">
                             @error('teacher_profile')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Posts Tags </label> |

                                  <small>Saprate words with comma</small>
                                  <input type="text" name="post_tags" class="form-control @error('post_tags') is-invalid @enderror" value="{{ old('post_tags') }}">
                                  @error('post_tags')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Post Category</label>
                                  <input type="text" name="post_categories" class="form-control @error('post_categories') is-invalid @enderror" value="{{ old('post_categories') }}">
                                  @error('post_categories')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
                      <img src="https://keeleandfinchdentaloffice.com/wp-content/uploads/2016/10/orionthemes-placeholder-image-750x750.jpg" style="width: 100%; height: 100%;" id="blah">
                    </div>
                  </div>
                </div>


                </div> 
            </div> 
        </div>
    </div> 
</div>






    
  @endsection