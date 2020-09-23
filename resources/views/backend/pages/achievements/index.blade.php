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
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                            <i class="icon icon-home2"></i>All Achievements</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('admin/achievements/create') }}"><i class="icon icon-plus-circle mb-3"></i>Add New</a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"><i class="icon icon-calendar"></i>By Date</a>
                    </li> -->
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

                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>#</th>
                                            <th>Student Name</th> 
                                            <th>Student Field</th>
                                            <th>Student Description</th>
                                            <th>Published Date</th> 
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                    @php($no = 1)

                                    @if( count($achievements) > 0)

                                    @foreach( $achievements as $achievement )

                                        <tr>
                                            <td>{{ $no++ }}</td>

                                            <td>
                                                <div class="avatar avatar-md mr-3 mt-1 float-left"> 
                                                    @if(!empty( $achievement->student_picture ))
                                                    <img src="/uploads/achievements/{{ $achievement->student_picture }}">
                                                    @else
                                                    <img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg">   
                                                    @endif 
                                                </div> 
                                                    <div>
                                                        <strong style="margin-top: 10px">{{ $achievement->student_name  }}</strong>
                                                    </div> 
                                            </td>

                                            <td>{{ $achievement->student_field }}</td> 

                                            <td>{{ \Str::limit($achievement->student_description, 12) }}</td>
                                            <td> {{ $achievement->created_at->diffForHumans()}}</td> 
                                            <td> 
                                                <a href="{{ route('edit.achievement', $achievement->id ) }}"><i class="icon-pencil text-green mr-3"></i></a>
                                                <a href="{{ route('delete.achievement', $achievement->id ) }}"><i class="icon-trash text-red mr-3"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                     @else

                                     <tr><td></td><td>No Achievements Found...</td><td></td> <td></td> <td></td> <td></td> <td></td></tr>

                                     @endif



                                        
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                       {{ $achievements->links() }}
                    </ul>
                </nav> 
            </div> 
        </div>
    </div>
</div>







    
  @endsection