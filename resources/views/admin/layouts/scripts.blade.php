<script src={{asset('adminAssets/js/jquery.min.js')}}></script>
<script src={{asset('adminAssets/js/bootstrap.bundle.js')}}></script>
<script>
    $(document).ready(function (){
        $("#switch_on_sidebar").click(function (){
            $("#switch_off_sidebar").attr("style",'display:block !important')
            $("#switch_on_sidebar").attr("style",'display:none !important')
            let $width = window.innerWidth;
            if($width >= 992){
                $(".wrap_sidebar").animate({'margin-right':'-=16.66666667%'});
                setTimeout(function (){
                    $(".wrap_content").removeClass('col-lg-10')
                    $(".wrap_content").addClass('col-lg-12')
                },250)
            }
            else if($width >= 768){
                $(".wrap_sidebar").animate({'margin-right':'-=25%'});
                setTimeout(function (){
                    $(".wrap_content").removeClass('col-md-9')
                    $(".wrap_content").addClass('col-md-12')
                },250)

            }
            else if($width >= 576){
                $(".wrap_sidebar").animate({'margin-right':'-=41.66666667%'});
                setTimeout(function (){
                    $(".wrap_content").removeClass('col-md-10')
                    $(".wrap_content").addClass('col-md-12')
                },250)
            }
            else {
                $(".wrap_sidebar").animate({'margin-right':'-=100%'});
                // setTimeout(function (){
                //     $(".wrap_content").removeClass('col-md-10')
                //     $(".wrap_content").addClass('col-md-12')
                // },250)
            }



        })
        $("#switch_off_sidebar").click(function (){
            $("#switch_on_sidebar").attr("style",'display:block !important')
            $("#switch_off_sidebar").attr("style",'display:none !important')
            let $width = window.innerWidth;
            if($width >= 992){
                $(".wrap_sidebar").animate({'margin-right':'+=16.66666667%'});
                $(".wrap_content").removeClass('col-lg-12')
                $(".wrap_content").addClass('col-lg-10')
            }
            else if($width >= 768){
                $(".wrap_sidebar").animate({'margin-right':'+=25%'});
                $(".wrap_content").removeClass('col-md-12')
                $(".wrap_content").addClass('col-md-9')
            }
            else if($width >= 576){
                $(".wrap_sidebar").animate({'margin-right':'+=41.66666667%'});
                $(".wrap_content").removeClass('col-sm-5')
                $(".wrap_content").addClass('col-sm-12')
            }
            else{
                $(".wrap_sidebar").animate({'margin-right':'+=100%'});
            }





        })

        $("#menu_toggle").click(function (){
            $("#header_content").fadeToggle()
        })

        // $(window).resize(function(){
        //     console.log($(document).width()); // This will report the width of your div in px.
        // });
        $("#fullscreen").click(function (){
            // $("#fullscreen").toggle($(document).fullScreen() != null)
            // console.log( $(document).fullScreen())
            $(document).toggleFullScreen();
        })
    })
</script>
<script src="{{asset('adminAssets/js/fullscreen.min.js')}}"></script>
<script src="{{asset('adminAssets/js/jquery-confirm.min.js')}}"></script>

@yield('scripts')
@yield('styles')
