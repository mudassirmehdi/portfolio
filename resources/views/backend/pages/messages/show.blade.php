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
                        <i class="icon-envelope"></i>
                        Messages
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Read Message</a>
                    </li> 
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">  
                <div class="row my-3">

                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                             <div class="card-body">
                                <div>
                                    <div class="media"> 
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 font-weight-normal">{{ $message->name }}</h6> 
                                         
                                            <small>{{ $message->created_at }}</small>
                                            <br><br>
                                            <h4>{{ $message->subject }}</h4>
                                            <div class="my-3 show">
                                                <div>
                                                    <p>{{ $message->message }}</p>
                                                </div> 
                                                Reply On: {{ $message->phone }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>






    
  @endsection