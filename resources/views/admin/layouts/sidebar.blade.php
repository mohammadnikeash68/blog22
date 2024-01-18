
<div class="col-md-3 col-lg-2 col-12 col-sm-5 wrap_sidebar z-2  position-fixed shadow  p-3 h_100vh bg-sidebar">
    <ul class="navbar-nav font-1 text-muted">
        <li class="nav-header me-3 my-3">
            <span class="nav-label">خانه</span>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-home-alt"></i>
                <span class="me-2 display-7">داشبورد</span>
                <kbd class="bg-danger">1</kbd>
            </a>
        </li>
        <li class="nav-header me-3 my-3">
            <span class="nav-label">دسته بندی ها</span>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link" onclick="showMenu()">
                <i class="fa fa-list"></i>
                <span class="me-2 display-7">دسته ها</span>
                <i class="fas fa-angle-down icon-angle deactive float-start"></i>
                <i class="fas fa-angle-left icon-angle float-start"></i>
            </a>
            <ul class="me-3 sub-ul me-5">
                <li class="nav-item my-2">
                    <a href="{{route('admin.category.index')}}" class="ms-2  text-link h6">لیست دسته بندی ها</a>

                </li>
                <li class="my-3">
                    <a href="#" class="ms-2 text-link h6">دسته سه</a>
                </li>
                <li class="my-2">
                    <a href="#" class="ms-2 text-link h6">دسته چهار</a>
                </li>
            </ul>
        </li>
        <li class="nav-header me-3 my-3">
            <span class="nav-label">نوشته ها</span>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-note-sticky"></i>
                <span class="me-2 display-7">نوشته ها</span>
            </a>
        </li>
        <li class="nav-header me-3 my-3">
            <span class="nav-label">کاربران</span>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-users"></i>
                <span class="me-2 display-7">کاربران</span>
            </a>
        </li>
        <li class="nav-header me-3 my-3">
            <span class="nav-label">تنظیمات</span>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-box"></i>
                <span class="me-2 display-7">تنظیمات</span>
            </a>
        </li>

    </ul>
</div>
@section('scripts')

@endsection
<script>

    function showMenu(){

        $(".sub-ul").slideToggle('slow',function (){
            $('.fa-angle-down').toggleClass('deactive')
            $('.fa-angle-left').toggleClass('deactive')
        });





    }
</script>

@section('styles')
    <style>
        .sub-ul{
            display: none;
        }
        .icon-angle{
            font-size: 10px;
            margin-right: 2px;
        }

        .active{
            display: block;
        }
        .deactive{
            display: none;
        }
    </style>

@endsection
