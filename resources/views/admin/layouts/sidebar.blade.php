
<div class="col-md-3 col-lg-2 col-12 col-sm-5 wrap_sidebar z-2  position-fixed shadow  p-3 h_100vh bg-sidebar">
    <ul class="navbar-nav font-1 text-muted">
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-home-alt"></i>
                <span>خانه</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link" onclick="showMenu()">
                <i class="fa fa-list"></i>
                <span>دسته ها</span>
                <i class="fas fa-angle-down"></i>
            </a>
            <ul class="me-3 sub-ul">
                <li class="nav-item">
                    <a href="#" class="ms-2 fz-2 text-link">دسته دو</a>

                </li>
                <li>
                    <a href="#" class="ms-2 text-link">دسته سه</a>
                </li>
                <li>
                    <a href="#" class="ms-2 text-link">دسته چهار</a>
                </li>
            </ul>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-note-sticky"></i>
                <span>نوشته ها</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-users"></i>
                <span>کاربران</span>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="#" class="nav-link text-link">
                <i class="fa fa-box"></i>
                <span>تنظیمات</span>
            </a>
        </li>

    </ul>
</div>
@section('scripts')
<script>

    function showMenu(){
        (function() {
            orig = $.fn.css;
            $.fn.css = function() {
                var result = orig.apply(this, arguments);
                $(this).trigger('stylechanged');
                return result;
            }
        })();
        $(".sub-ul").slideToggle();
        // if ($('.sub-ul').slideDown()){
        //
        // }
        // if($('.sub-ul').slideUp()){
        //
        // }
        $('.sub-ul').on('stylechanged', function () {
            console.log('css changed');
        });



    }
</script>

@endsection
@section('styles')
    <style>
        .sub-ul{
            display: none;
        }
    </style>

@endsection
