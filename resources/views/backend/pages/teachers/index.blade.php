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
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Teachers</a>
                    </li>
                    <li>
                        <a class="nav-link"  href="{{ url('admin/teachers/create') }}"><i class="icon icon-face"></i> Add New</a>
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

                <div class="row my-3">

                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>#</th>
                                            <th>USER NAME</th>
                                            <th>Postion</th>
                                            <th>Education</th>
                                            <th>Description</th>
                                            <th>Created At</th> 
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                    @php($no = 1)

                                    @if( count($teachers) > 0)

                                    @foreach( $teachers as $teacher )

                                        <tr>
                                            <td>{{ $no++ }}</td>

                                            <td>
                                                <div class="avatar avatar-md mr-3 mt-1 float-left"> 
                                                    @if(!empty( $teacher->teacher_profile ))
                                                    <img src="/uploads/teachers/{{ $teacher->teacher_profile }}">
                                                    @else
                                                    <img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg">   
                                                    @endif 
                                                </div>
                                                <div>
                                                    <div>
                                                        <strong>{{ $teacher->teacher_name  }}</strong>
                                                    </div>
                                                    <small>{{ $teacher->teacher_email  }}</small>
                                                </div>
                                            </td>

                                            <td>{{ $teacher->teacher_position }}</td>
                                            <td>{{ $teacher->teacher_education }}</td>

                                            <td>{{ \Str::limit($teacher->teacher_description, 12) }}</td>
                                            <td> {{ $teacher->created_at->diffForHumans()}}</td> 
                                            <td>
                                                <a href="#"><i class="icon-eye mr-3"></i></a>
                                                <a href="{{route('edit.teacher',$teacher->id)}}"><i class="icon-pencil text-green mr-3"></i></a>
                                                <a href="{{route('delete.teacher',$teacher->id)}}"><i class="icon-trash text-red mr-3"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                     @else

                                     <tr><td></td><td>No Teacher Found...</td><td></td> <td></td> <td></td> <td></td> <td></td></tr>

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
                       {{ $teachers->links() }}
                    </ul>
                </nav>
            </div> 
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="{{ url('admin/teachers/create') }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></a>
</div>






    
  @endsection