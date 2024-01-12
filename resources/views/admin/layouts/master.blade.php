<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head-tag')

</head>

<body class="bg-secondary-subtle">
<div class="wrap_panel_all">
    @include('admin.layouts.header')
    <section class="wrap_content_sidebar position-relative top-2rem">
        <div class="row">
            @include('admin.layouts.sidebar')
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-9 wrap_content col-lg-10">
                @yield('content')
            </div>
            <!--            end wrap_content-->
        </div>
    </section>
    <!--    end wrap_content_sidebar-->
</div>

@include('admin.layouts.scripts')

</body>
</html>
