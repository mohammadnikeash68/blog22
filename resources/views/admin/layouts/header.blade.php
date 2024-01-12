
<header class="header position-fixed end-0 start-0 z-3">
    <div class="row">
        <div class="col-md-3 col-12 col-lg-2 py-2 p-0 bg-sidebar">
            <div class="header-sidebar d-flex flex-row-reverse flex-md-row justify-content-between align-items-center px-2 ">

                <i class="fa fa-ellipsis-h pointer d-block d-md-none text-white" id="menu_toggle" data-status="0"></i>
                <img src="{{asset('adminAssets/images/logo.png')}}">
                <i class="fa fa-toggle-on pointer text-white" id="switch_on_sidebar" data-status="0"></i>
                <i class="fa fa-toggle-off pointer d-none text-white" id="switch_off_sidebar" data-status="0"></i>
            </div>
            <!--                      end header-sidebar-->
        </div>
        <div class="col-md-9 col-lg-10 py-2 col-12 z-3  d-md-block shadow p-0 bg-white px-2 z-3" id="header_content" style="display: none">
            <div class="header-content d-flex justify-content-between">
                <div class="header-content-right d-flex justify-content-around align-items-center col-md-3 ">
                    <i class="fa fa-search"></i>
                    <i class="fa fa-expand pointer" id="fullscreen"></i>
                </div>
                <!--                       end header-content-right-->
                <div class="header-content-left col-md-3 d-flex align-items-center justify-content-around ">
                    <div class="btn-group">
                                <span class="far fa-bell" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </span>
                        <ul class="dropdown-menu rounded-1 shadow font-1">
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-cog ms-2"></i> تنظیمات</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-user ms-2"></i> کاربر </a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"> <i class="fa fa-envelope ms-2"></i> پیام ها</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-lock ms-2"></i>قفل صفحه</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="fa fa-sign-out ms-2"></i>خروج</a></li>
                        </ul>
                    </div>
                    <i class="far fa-comment-alt">
                        <sup class="badge badge-danger">4</sup>
                    </i>
                    <div class="list-group">
                                <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </span>
                        <ul class="dropdown-menu rounded-1 shadow font-1 border-0 ">
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-cog ms-2"></i> تنظیمات</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-user ms-2"></i> کاربر </a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"> <i class="fa fa-envelope ms-2"></i> پیام ها</a></li>
                            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa fa-lock ms-2"></i>قفل صفحه</a></li>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit" >
                                        <i class="fa fa-sign-out ms-2"></i>خروج
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--                       end header-content-left-->
            </div>
            <!--                    end header-content-->
        </div>
    </div>
</header>
