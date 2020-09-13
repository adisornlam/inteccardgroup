<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>

<!-- header -->
@include('includes.header')
<!-- //header -->

@yield('content')

<!--footer -->
@include('includes.footer')
<!-- //footer -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="{{asset('inteccardgroup/theme1/js/jquery.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/popper.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('inteccardgroup/theme1/js/google-map.js')}}"></script>
<script src="{{asset('inteccardgroup/theme1/js/main.js')}}"></script>
</body>
</html>