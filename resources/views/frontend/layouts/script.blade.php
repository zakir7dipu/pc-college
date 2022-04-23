
<!-- Import Jquery 3.2.1 Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery-3.2.1.min.js') }}"></script>
<!-- Import Proper Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/popper.min.js') }}"></script>
<!-- Import Bootstrap 4 Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/bootstrap.min.js') }}"></script>
<!-- Import imagesloaded -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/imagesloaded.min.js') }}"></script>
<!-- Import Bootstrap Slider Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/bootstrap-slider.js') }}"></script>
<!-- Import Jquery Ui Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery-ui.js') }}"></script>
<!-- Import Flexslider Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery.flexslider-min.js') }}"></script>
<!-- Import Slick Slider Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/slick.min.js') }}"></script>
<!-- Import Owl Carusel Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/owl.carousel.min.js') }}"></script>
<!-- Import Filterizr -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery.filterizr.min.js') }}"></script>
<!-- Import Videopopup Js -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/VideoPopUp.jquery.js') }}"></script>
<!-- Import Map js-->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/map.js') }}"></script>
<!-- Import Animation Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/css3-animate-it.js') }}"></script>
<!-- Import Magnific Popup Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/magnific-popup.min.js') }}"></script>
<!-- Import Fancybox Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery.fancybox.js') }}"></script>
<!-- Import Player Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/player.min.js') }}"></script>
<!-- toastr alert -->
<script src="{{asset('notification_assets/js/toastr.min.js')}}"></script>
<!-- Calendar Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/jquery.calendar.min.js') }}"></script>
<!-- Import Script Js  -->
<script type="text/javascript" src="{{ asset('frontend/theme1/js/script.js') }}"></script>

@yield('page-script')
<script !src="">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @elseif(count($errors) > 0)
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
