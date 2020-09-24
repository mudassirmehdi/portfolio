<div id="app">
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class=" mt-3 mb-3 ml-3">
             <a href="{{ url('/') }}" target="_blank"><img src="{{ asset('frontend/images/logo.png') }}" height="60"></a>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        @if(!empty(Auth::user()->profile_image))
                            <img src="/uploads/profiles/{{ Auth::user()->profile_image }}" class="user_avatar" width="100" style="width: 60px; height: 60px;">
                            @else
                                <img src="https://st4.depositphotos.com/1156795/20814/v/450/depositphotos_208142514-stock-illustration-profile-placeholder-image-gray-silhouette.jpg" class="user_avatar" width="100" style="width: 60px; height: 60px;">    
                            @endif 
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">{{ Auth::user()->name }}</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="{{ url('admin/settings') }}" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="{{ url('admin/settings') }}" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="{{ url('admin/settings') }}" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu"> 
            <li class="treeview"><a href="{{ url('admin') }}">
                <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
            </a> 
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon icon-package blue-text s-18"></i>
                <span>Posts</span>
                <!-- <span class="badge r-3 badge-primary pull-right">4</span> -->
            </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/posts') }}"><i class="icon icon-circle-o"></i>All Posts</a>
                    </li>
                    <li><a href="{{ url('admin/posts/create') }}"><i class="icon icon-add"></i>Add
                        New </a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Teachers<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/teachers') }}"><i class="icon icon-circle-o"></i>All Teachers</a>
                    </li>
                    <li><a href="{{ url('admin/teachers/create') }}"><i class="icon icon-add"></i>Add New</a>
                    </li> 
                </ul>
            </li> 

            <li class="treeview"><a href="#"><i class="icon icon-award pink-text s-14"></i>Achievements<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/achievements') }}"><i class="icon icon-circle-o"></i>All Achievements</a>
                    </li>
                    <li><a href="{{ url('admin/achievements/create') }}"><i class="icon icon-add"></i>Add Achievement</a> 
                    </li> 
                </ul>
            </li>

             <li class="treeview no-b"><a href="{{ url('admin/messages') }}">
                <i class="icon icon-package light-green-text s-18"></i>
                <span>Messages</span> 
            </a> 
            </li>


            <li class="treeview"><a href="#">
                <i class="icon icon-sailing-boat-water purple-text s-18"></i> 
                <span>Admission</span>
                <!-- <span class="badge r-3 badge-success pull-right">20</span> -->
                
            </a> 
            </li> 

           <!--  <li class="treeview"><a href="#">
                <i class="icon icon-dialpad blue-text  s-18"></i>
                <span>Gallery</span> </a> 
            </li>
 -->
            <li class="treeview"><a href="{{ url('admin/settings') }}">
                <i class="icon icon-cog orange-text  s-18"></i>
                <span>Settings</span> 
            </a> 
            </li>

            <li class="treeview"><a href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                <i class="icon icon-power-off red-text  s-18"></i>
                <span>Logout</span> 
            </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
            </li> 

        </ul>
    </section>
</aside>
<!--Sidebar End-->