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
                        Gallery
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Photos</a>
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
                                            <th>Image</th>
                                            <th>Title</th>  
                                            <th>Uploaded Date</th> 
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody> 

                                        <tr>
                                            <td></td>

                                            <td>
                                                <div class="avatar-md mr-3 mt-1 float-left">   
                                                    <img src="https://loverary.files.wordpress.com/2013/10/facebook-default-no-profile-pic.jpg?w=1200">  
                                                </div>
                                                <div>  
                                                </div>
                                            </td>

                                            <td>Foramt</td>  
                                            <td> 2 days ago</td> 
                                            <td> 
                                                <a href="#"><i class="icon-trash text-red"></i></a>
                                            </td>
                                        </tr> 



                                        
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                       Links Goes Here
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