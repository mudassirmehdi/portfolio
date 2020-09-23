  @extends('backend.layouts.master')

  @section('content')  

  <!-- GetMessge Count iN sidebar --> 
    @push('unreadMessage')
          @php($counter = 1 ) 
          @foreach( $unread as $unread1 )
            <span class="badge r-3 badge-success pull-right">{{ $counter++ }}</span>
          @endforeach 
    @endpush
                
  <!-- GetMessge Count iN sidebar -->

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
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Messages</a>
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
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Message</th> 
                                            <th>Created At</th> 
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                    @php($no = 1)

                                    @if( count($messages) > 0)

                                    @foreach( $messages as $message )
                                    
                                        <tr>
                                            <td>{{ $no++ }}</td>

                                            <td>
                                                @if($message->seen == 0 ) 
                                                <div class="avatar avatar-xs mr-3 mt-1 float-left"> 
                                                    <img src="{{ asset('backend/img/icon/icon-red.png') }}">
                                                </div> 
                                                @else
                                                <div class="avatar avatar-xs mr-3 mt-1 float-left"> 
                                                    <img src="{{ asset('backend/img/icon/icon-green.png') }}">
                                                </div>
                                                @endif
                                                <div>
                                                    <div>
                                                        <strong>{{ $message->name  }}</strong>
                                                    </div>
                                                    <small>{{ $message->email  }}</small>
                                                </div>
                                            </td>

                                            <td>{{ $message->phone }}</td> 

                                            <td>{{ \Str::limit($message->message, 12) }}</td>
                                            <td> {{ $message->created_at->diffForHumans()}}</td> 
                                            <td>
                                                <a href="{{ route('read.message', $message->id) }}"><i class="icon-eye mr-3"></i></a>
                                                <a href="{{ route('delete.message', $message->id) }}"><i class="icon-trash text-red mr-3"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                     @else

                                     <tr><td></td><td>No Messages Found...</td><td></td> <td></td> <td></td> <td></td> <td></td></tr>

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
                       {{ $messages->links() }}
                    </ul>
                </nav>
            </div> 
        </div>
    </div>
</div>






    
  @endsection